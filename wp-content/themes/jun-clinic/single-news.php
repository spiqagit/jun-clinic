<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>
<body class="pg_news">
<?php get_header(); ?>

<main class="ly_main">

<div class="el_pageTtlPost">
    <div class="el_pageTtlPost_inner">
        <span class="el_pageTtlPost_en">NEWS</span>
        <h1 class="el_pageTtlPost_ja"><?php the_title(); ?></h1>
        <time class="el_pageTtlPost_date" datetime="<?php echo get_post_time('Y-m-d'); ?>"><?php echo get_post_time('Y.m.d'); ?></time>  
    </div>
</div><!-- /ly_pageTtl -->



<div class="ly_inner ly_edit un_news">
    <div class="el_edit">
        <?php the_content(); ?>
    </div>
    <a href="<?php echo home_url(); ?>/news/" class="el_btnNormal">一覧へ戻る</a>
</div><!-- /ly_inner -->

</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

</body>
</html>
