import { defineConfig } from 'vite';
import { resolve } from 'path';
import fs from 'fs';
import path from 'path';

// テーマ名
const themeName = 'jun-clinic';

// 画像をコピーする関数
function copyImages() {
    const srcImgDir = resolve(__dirname, 'src/img');
    const destImgDir = resolve(__dirname, `../wp-content/themes/${themeName}/assets/img`);
    if (fs.existsSync(srcImgDir)) {
        try {
            fs.mkdirSync(destImgDir, { recursive: true });
            fs.cpSync(srcImgDir, destImgDir, { recursive: true });
        } catch (err) {
            console.error(`[ERROR] Failed to copy images: ${err.message}`);
        }
    }
}

// PHPファイルをコピーする関数
function copyPHPFiles() {
    const srcDir = resolve(__dirname, 'public');
    const destDir = resolve(__dirname, `../wp-content/themes/${themeName}`);

    function copyRecursively(src, dest) {
        const files = fs.readdirSync(src, { withFileTypes: true });
        files.forEach(file => {
            const srcPath = path.join(src, file.name);
            const destPath = path.join(dest, file.name);

            if (file.isDirectory()) {
                try {
                    fs.mkdirSync(destPath, { recursive: true });
                    copyRecursively(srcPath, destPath);
                } catch (err) {
                    console.error(`[ERROR] Failed to create directory: ${destPath}, ${err.message}`);
                }
            } else {
                try {
                    fs.copyFileSync(srcPath, destPath);
                } catch (err) {
                    console.error(`[ERROR] Failed to copy file: ${srcPath} to ${destPath}, ${err.message}`);
                }
            }
        });
    }

    if (fs.existsSync(srcDir)) {
        try {
            fs.mkdirSync(destDir, { recursive: true });
            copyRecursively(srcDir, destDir);
        } catch (err) {
            console.error(`[ERROR] Failed to copy PHP files: ${err.message}`);
        }
    }
}

// 削除処理を追加する関数
function deleteFromTheme(file) {
    const relativePath = path.relative(resolve(__dirname, 'public'), file);
    const destPath = resolve(__dirname, `../wp-content/themes/${themeName}`, relativePath);
    if (fs.existsSync(destPath)) {
        try {
            fs.unlinkSync(destPath);
        } catch (err) {
            console.error(`[ERROR] Failed to delete file: ${destPath}, ${err.message}`);
        }
    }
}

export default defineConfig({
    build: {
        outDir: `../wp-content/themes/${themeName}/assets`,
        emptyOutDir: true,
        assetsDir: '',
        copyPublicDir: false,
        rollupOptions: {
            input: {
                main: 'src/js/main.js',
                top: 'src/js/top.js',
                common: 'src/scss/common.scss',
            },
            output: {
                entryFileNames: '[name].js',
                chunkFileNames: '[name].js',
                assetFileNames: '[name].css',
            },
        },
    },
    plugins: [
        {
            name: 'watch-and-copy-files',
            buildStart() {
                const cssDir = resolve(__dirname, `../wp-content/themes/${themeName}/assets/css/css`);
                const jsDir = resolve(__dirname, `../wp-content/themes/${themeName}/assets/js/js`);
                [cssDir, jsDir].forEach(dir => {
                    if (fs.existsSync(dir)) {
                        try {
                            fs.rmSync(dir, { recursive: true, force: true });
                        } catch (err) {
                            console.error(`[ERROR] Failed to remove directory: ${dir}, ${err.message}`);
                        }
                    }
                });

                // 初回ビルド時に PHP ファイルをコピー
                copyPHPFiles();
                copyImages();
            },
            closeBundle() {
                // ビルド完了後に画像と PHP ファイルをコピー
                copyImages();
                copyPHPFiles();
            },
            configureServer(server) {
                // publicディレクトリの監視を追加
                server.watcher.add('public/**/*');
                server.watcher.on('change', (file) => {
                    if (file.includes('src/img')) {
                        copyImages();
                    }
                    if (file.includes('public') && file.endsWith('.php')) {
                        copyPHPFiles();
                    }
                });
                server.watcher.on('add', (file) => {
                    if (file.includes('src/img')) {
                        copyImages();
                    }
                    if (file.includes('public') && file.endsWith('.php')) {
                        copyPHPFiles();
                    }
                });
                server.watcher.on('unlink', (file) => {
                    if (file.includes('public') && file.endsWith('.php')) {
                        deleteFromTheme(file);
                    }
                });
            },
        },
    ],
    server: {
        watch: {
            include: ['public/**/*', 'src/**/*'],
        },
    },
});
