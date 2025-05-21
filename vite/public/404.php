<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>
<body class="pg_404">
<?php get_header(); ?>

<main class="ly_main">

<div class="ly_pageTtl02">
    <div class="ly_pageTtl02_inner">
        <h1 class="el_pageTtl02_ja">ページが見つかりませんでした</h1>    
    </div>
</div><!-- /ly_pageTtl -->

<div class="ly_inner ly_edit un_news">
    <div class="el_edit">
        <p>お探しのページが見つかりません。<br>
        一時的にアクセスできない状況にあるか、移動もしくは削除された可能性があります。</p>
    </div>
    <a href="<?php echo home_url(); ?>" class="el_btnNormal">TOP</a>
</div><!-- /ly_inner -->

</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

</body>
</html>
