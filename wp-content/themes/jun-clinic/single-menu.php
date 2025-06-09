<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>

<body class="pg_price">
    <div class="bl_commonBgContainer">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/bg.png" alt="">
    </div>
    <?php get_header(); ?>

    <?php
    if (get_the_terms(get_the_ID(), 'page-cat')) {
        $page_cat = get_the_terms(get_the_ID(), 'page-cat');
    } else {
        $page_cat = false;
    }
    ?>
    <main class="ly_commonPage ly_overBg">

        <?php if ($page_cat): ?>
            <?php if ($page_cat[0]->slug == 'favorite-menu'): ?>

                <!-- リッチメニュー -->
                <div class="ly_richMenuTtlSec">
                    <?php if (get_field('favo-menuFvImg') && get_field('favo-menuFvImg_sp')) : ?>
                        <picture class="bl_richMenuTtlSec_bg">
                            <source srcset="<?php echo get_field('favo-menuFvImg_sp'); ?>" media="(max-width: 768px)">
                            <img src="<?php echo get_field('favo-menuFvImg'); ?>" alt="" width="1440" height="620">
                        </picture>
                    <?php endif; ?>
                    <div class="bl_richMenuTtlSec_inner">
                        <?php get_template_part('inc/breadcrumbs'); ?>
                        <div class="bl_richMenuTtlSec_inner_ttlContainer">
                            <div class="bl_richMenuTtlSec_inner_ttlContainer_inner">
                                <hgroup class="bl_richMenuTtlWrapper">
                                    <?php if (get_field('menu-enTxt')) : ?>
                                        <p class="el_richMenuTtlWrapper_enTxt"><?php echo get_field('menu-enTxt'); ?></p>
                                    <?php endif; ?>
                                    <h1 class="el_richMenuTtlWrapper_ttl">
                                        <?php the_title(); ?>
                                    </h1>
                                </hgroup>
                            </div>
                        </div>
                    </div>
                </div>


            <?php endif; ?>

        <?php else: ?>

            <div class="bl_commonSingleTtlContainer">
                <div class="bl_commonSingleTtlContainer_inner">
                    <div class="bl_commonSingleTtlContainer_breadcrumbs">
                        <?php get_template_part('inc/breadcrumbs'); ?>
                    </div>
                    <div class="bl_commonSingleTtlContainer_ttlContainer">
                        <h1 class="bl_commonSingleTtlContainer_ttl">
                            <?php the_title(); ?>
                        </h1>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <div class="bl_menuArticleSec">
            <div class="bl_menuArticleSec_inner">

                <!-- ナビ -->
                <div class="bl_naviContainer">
                    <div class="bl_naviContainer_ttlContainer">
                        <h2 class="bl_naviContainer_ttlContainer_ttl">Index</h2>
                    </div>
                    <nav class="bl_naviContainer" id="article-navi">
                    </nav>
                </div>

                <article class="bl_menuArticleSec_inner_article ">
                    <div class="bl_articlePage_article">
                        <?php the_content(); ?>
                    </div>
                    <?php
                    $supervisorTermList = get_the_terms(get_the_ID(), 'post-supervisor');
                    if ($supervisorTermList && !is_wp_error($supervisorTermList)) :
                    ?>
                        <?php foreach ($supervisorTermList as $supervisorTerm) : ?>
                            <div class="bl_supervisorProfile">
                                <div class="bl_supervisorProfile_inner">
                                    <div class="bl_supervisorProfile_inner_imgContainer">
                                        <img src="<?php echo get_field('supervisor-img', 'term_' . $supervisorTerm->term_id); ?>" alt="<?php echo $supervisorTerm->name; ?>">
                                        <div class="bl_supervisorProfile_inner_ttl">
                                            <p class="el_supervisorProfile_inner_ttl_txt">この記事の監修者</p>
                                            <div class="bl_supervisorProfile_inner_ttl_info">
                                                <?php if (get_field('supervisor-job', 'term_' . $supervisorTerm->term_id)) : ?>
                                                    <p class="el_supervisorProfile_inner_ttl_info_job"><?php echo get_field('supervisor-job', 'term_' . $supervisorTerm->term_id); ?></p>
                                                <?php endif; ?>
                                                <p class="el_supervisorProfile_inner_ttl_info_name"><?php echo $supervisorTerm->name; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (get_field('supervisor-txt', 'term_' . $supervisorTerm->term_id)) : ?>
                                        <div class="bl_supervisorProfile_inner_txtContainer">
                                            <p class="el_supervisorProfile_inner_txtContainer_txt"><?php echo get_field('supervisor-txt', 'term_' . $supervisorTerm->term_id); ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (get_field('supervisor-link', 'term_' . $supervisorTerm->term_id)) : ?>
                                        <div class="bl_supervisorProfile_inner_linkContainer">
                                            <a href="<?php echo get_field('supervisor-link', 'term_' . $supervisorTerm->term_id); ?>" class="bl_commonBorderRadialArrowBtn">
                                                <p class="el_commonBorderRadialArrowBtn_txt">プロフィールを見る</p>
                                                <div class="el_commonBorderRadialArrowBtn_arrowContainer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8">
                                                        <path d="M7.46484 0.464844C7.66011 0.269582 7.97661 0.269582 8.17188 0.464844L11.3535 3.64648C11.5488 3.84175 11.5488 4.15825 11.3535 4.35352L8.17188 7.53516C7.97661 7.73042 7.66011 7.73042 7.46484 7.53516C7.26958 7.33989 7.26958 7.02339 7.46484 6.82813L9.79297 4.5H1C0.723858 4.5 0.5 4.27614 0.5 4C0.5 3.72386 0.723858 3.5 1 3.5H9.79297L7.46484 1.17188C7.26958 0.976613 7.26958 0.660106 7.46484 0.464844Z"></path>
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </article>
            </div>
        </div>

    </main>

    <?php get_footer(); ?>

</body>

</html>