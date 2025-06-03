<?php
/*
Template Name: キャンセルポリシー
*/
?>

<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>

<body>
    <div class="bl_commonBgContainer">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/bg.png" alt="">
    </div>
    <?php get_header(); ?>

    <main class="ly_overBg ly_articlePage">

        <div class="bl_commonPageTtlContainer">
            <?php get_template_part('inc/breadcrumbs'); ?>
            <div class="bl_commonPageTtlContainer_inner">
                <h1 class="el_commonPageTtlContainer_inner_ttl">当院へご予約頂く皆様へ</h1>
            </div>
            <picture class="el_commonPageTtlContainer_waveLine">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/page-wave-line-sp.png" media="(max-width: 768px)">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/page-wave-line.png" alt="">
            </picture>
        </div>

        <div class="bl_articlePage_contents">
            <div class="bl_articlePage_inner_inner">
                <div class="bl_articlePage_article">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </main>

    <?php get_footer(); ?>
</body>


</html>