## フォルダ構造
vite/
├── public/                 # 静的ファイルを配置
│   ├── inc/               # インクルードファイル
│   ├── block-list/        # ブロックリスト関連ファイル
│   ├── single-price.php
│   ├── single-menu.php
│   ├── single-clinic.php
│   ├── single-doctor.php
│   ├── archive-doctor.php
│   ├── archive-price.php
│   ├── search-case.php
│   ├── search-column.php
│   ├── header.php
│   ├── footer.php
│   ├── functions.php
│   ├── index.php
│   └── その他のPHPファイル
│
├── src/                    # ソースコードのメインディレクトリ
│   ├── js/                # JavaScriptファイル
│   ├── scss/              # SCSSファイル
│   └── img/               # 画像ファイル
│
├── node_modules/          # 依存パッケージ
├── package.json           # プロジェクトの依存関係と設定
├── package-lock.json      # 依存関係のロックファイル
├── vite.config.js         # Vite設定ファイル
└── README.md             # プロジェクトの説明

## SCSSフォルダ
vite/src/scss/
├── object/                # オブジェクト指向CSSの実装
│   ├── component/        # 再利用可能なコンポーネントのスタイル
│   │   ├── _button.scss
│   │   ├── _card.scss
│   │   └── その他のコンポーネント
│   │
│   └── page/            # ページ固有のスタイル
│       ├── _home.scss
│       ├── _about.scss
│       └── その他のページ
│
├── layout/               # レイアウト関連のスタイル
│   ├── _header.scss     # ヘッダー部分のスタイル
│   └── _footer.scss     # フッター部分のスタイル
│
├── foundation/           # 基礎となるスタイル
│   ├── variable/        # 変数定義
│   │   ├── _color.scss
│   │   ├── _font.scss
│   │   └── _size.scss
│   │
│   └── function/        # 関数やミックスイン
│       ├── _mixin.scss
│       └── _function.scss
│
├── editor/              # エディタ用のスタイル
│   └── _editor.scss
│
├── common.scss          # 共通スタイルのエントリーポイント
└── editor.scss          # エディタスタイルのエントリーポイント

## 仕様について
下記のどちらかを行うと、ビルドできます
（１）[npm run build]のコマンドを打つ
（２）[npm run watch]のコマンドを打った後に[src]内の.scssまたは.jsを保存

## 願望
wp-content/themes/jun-clinicの変更はsrcとpublicに反映されないので…できるだけこの設計崩さないようにしておいてください…