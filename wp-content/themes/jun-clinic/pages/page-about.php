<?php
/*
Template Name: クリニックについて
*/
?>
<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>
<body class="pg_about">
<?php get_header(); ?>

<main class="ly_main">

<hgroup class="el_pageTtl">
    <h1 class="el_pageTtl_en">ABOUT</h1>
    <p class="el_pageTtl_ja">クリニックについて</p>
</hgroup><!-- /el_pageTtl -->

<div class="bl_aboutClinic">
    <h2 class="el_textBox_ttl">診療情報</h2>    
    <dl class="el_infoList">
        <div>
            <dt>クリニック名</dt>
            <dd>test CLINIC（テストクリニック）</dd>
        </div>
        <div>
            <dt>院長</dt>
            <dd>テスト太郎</dd>
        </div>
        <div>
            <dt>診療科目</dt>
            <dd>美容外科・美容皮膚科</dd>
        </div>
        <div>
            <dt>所在地</dt>
            <dd>〒000-0000<br>
            東京都渋谷区1-1-1 テストビル1F<br>
            <a href="https://maps.app.goo.gl/j69nK5WL8t6sGkZi9" target="_blank" class="el_link_blank">Google Mapsはこちら</a></dd>
        </div>
        <div>
            <dt>診療時間</dt>
            <dd><?php echo get_field('reception_hours', 'option'); ?></dd>
        </div>
        <div>
            <dt>休診日</dt>
            <dd>不定休</dd>
        </div>
        <div>
            <dt>電話番号</dt>
            <dd><?php echo get_field('tel', 'option'); ?></dd>
        </div>
    </dl>
</div><!-- /bl_aboutClinic -->


</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

</body>
</html>
