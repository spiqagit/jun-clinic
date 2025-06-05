## フォルダ構造
/venusbelt/
├─ src //[assets]にコンパイルさせるファイルたち
|  ├─img
|  ├─scss
|  │  ├─foundation/
|  │  │  ├─function/
|  │  │  └─variable/
|  │  ├─layout/
|  │  │  ├─_header.scss
|  │  │  └─_footer.scss
|  │  ├─object/
|  │  │  ├─component/
|  │  │  └─page/
|  │  ├─editor/
|  │  ├─common.scss
|  │  └─editor.scss
|  └─js
|     ├─main.js
|     └─top.js
├─public //そのまま反映されるファイルたち
│  ├─inc/
│  │  ├─post-types/
│  │  └─taxonomies/
│  ├─block-list/
│  ├─functions.php
│  ├─header.php
│  ├─footer.php
│  ├─index.php
│  ├─single-clinic.php
│  ├─single-doctor.php
│  ├─single-price.php
│  ├─archive-price.php
│  ├─archive-doctor.php
│  ├─page-default.php
│  ├─404.php
│  └─その他のPHPテンプレート
└─wp-content/themes/jun-clinic //[src]と[public]の中身が生成される場所
   └─...

## 仕様について
下記のどちらかを行うと、ビルドできます
（１）[npm run build]のコマンドを打つ
（２）[npm run watch]のコマンドを打った後に[src]内の.scssまたは.jsを保存

## 願望
wp-content/themes/jun-clinicの変更はsrcとpublicに反映されないので…できるだけこの設計崩さないようにしておいてください…