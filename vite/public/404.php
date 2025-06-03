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
                <h1 class="el_commonPageTtlContainer_inner_ttl">ページが見つかりません</h1>
            </div>
            <picture class="el_commonPageTtlContainer_waveLine">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/page-wave-line-sp.png" media="(max-width: 768px)">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/page-wave-line.png" alt="">
            </picture>
        </div>
        <div class="bl_page404Main">
            <div class="bl_page404Main_inner">
                <div class="bl_page404Main_txtContainer">
                    <p class="el_page404Main_txtContainer_ttl">SORRY..</p>
                    <p class="el_page404Main_txtContainer_txt">お探しのページが見つかりません。 <br>一時的にアクセスできない状況にあるか、移動もしくは削除された可能性があります。</p>
                </div>
                <a href="<?php echo home_url(); ?>" class="el_page404Main_btn">TOPへ戻る</a>
            </div>
        </div>
    </main>

    <?php get_footer(); ?>
</body>


</html>