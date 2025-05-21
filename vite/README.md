## フォルダ構造
/venusbelt/
├─ src //[assets]にコンパイルさせるファイルたち
|  └─img
|  └─scss
|  └─js
└─public //そのまま反映されるファイルたち
│  └─ index.php ...
└─ dist //[src]と[public]の中身が生成される場所
   └─ wp-content ...

## 仕様について
下記のどちらかを行うと、ビルドできます
（１）[npm run build]のコマンドを打つ
（２）[npm run watch]のコマンドを打った後に[src]内の.scssまたは.jsを保存

## 願望
distの変更はsrcとpublicに反映されないので…できるだけこの設計崩さないようにしておいてください…