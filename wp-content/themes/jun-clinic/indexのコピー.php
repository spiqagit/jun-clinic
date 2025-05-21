<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>
<body class="pg_top is_loading">
    <?php get_header(); ?>

    <main class="ly_main">

        <div class="ly_topFv">

        </div>
        <!-- /ly_topFv -->

        <div class="ly_menu">
            <div class="ly_inner">
                <h2 class="el_secTtl_top un_menu js_moveTtl">
                    <span>MENU</span>
                </h2>
                <p class="el_secTtl_top_sub">施術メニュー</p>
                <ul class="el_tabBtn js_tab_btn">
                    <li class="el_tabBtn_item is_active" rel="js_tab_1">美容皮膚科</li>
                    <li class="el_tabBtn_item" rel="js_tab_2">美容外科</li>
                </ul>

                <!-- 美容皮膚科 -->
                <div id="js_tab_1" class="js_tab_item">
                    <ul class="el_menuList_dermatology">
                        <?php
                        $custom_posts = get_posts(array(
                            'post_type' => 'menu',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'menu-cat',
                                    'field' => 'slug',
                                    'terms' => 'dermatology',
                                    'operator' => 'IN'
                                ),
                            )
                        ));
                        global $post;
                        if ($custom_posts): foreach ($custom_posts as $post): setup_postdata($post); ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endforeach;
                            wp_reset_postdata();
                        endif; ?>
                    </ul>
                </div>

                <div id="js_tab_2" class="js_tab_item">
                    <div class="el_menuList_cat">
                        <?php
                        $parent_term_id = get_term_by('slug', 'surgery', 'menu-cat')->term_id;
                        $child_terms = get_terms(array(
                            'taxonomy' => 'menu-cat',
                            'parent'   => $parent_term_id,
                            'hide_empty' => false,
                        ));

                        if ($child_terms && !is_wp_error($child_terms)) {
                            foreach ($child_terms as $child_term) { ?>
                                <div class="el_menuList_cat_wrap">
                                    <div class="el_menuList_cat_name js_acc_ttl">
                                        <span class="el_menuList_cat_ico"><img src="<?php echo get_field('ico', $child_term); ?>" alt=""></span>
                                        <span class="el_menuList_cat_text"><?php echo $child_term->name; ?></span>
                                    </div>
                                    <?php $custom_posts = get_posts(array(
                                        'post_type' => 'menu',
                                        'posts_per_page' => -1,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'menu-cat',
                                                'field' => 'term_id',
                                                'terms' => $child_term->term_id,
                                                'operator' => 'IN',
                                            ),
                                        ),
                                    ));
                                    global $post;
                                    if ($custom_posts): ?>
                                        <div class="el_menuList_cat_inList_wrap">
                                            <ul class="el_menuList_cat_inList">
                                                <?php foreach ($custom_posts as $post): setup_postdata($post); ?>
                                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                                <?php endforeach;
                                                wp_reset_postdata(); ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
                <a class="el_btnArrow" href="<?php echo home_url(); ?>/price/">
                    <span class="el_btnArrow_text">料金表はこちら</span>
                </a>
            </div>
        </div><!-- /ly_menu -->

        <div class="ly_case">
            <div class="ly_inner">
                <h2 class="el_secTtl_top02">CASE</h2>
                <a class="el_btnArrow un_sp" href="<?php echo home_url(); ?>/case/">
                    <span class="el_btnArrow_text">症例一覧</span>
                </a>
                <div class="js_topCase_slide">
                    <div class="swiper-wrapper">
                        <?php
                        $custom_posts = get_posts(array(
                            'post_type' => 'case',
                            'posts_per_page' => 3,
                        ));
                        global $post;
                        if ($custom_posts): foreach ($custom_posts as $post): setup_postdata($post); ?>
                                <div class="swiper-slide">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (have_rows('slide')) {
                                            the_row();
                                            $img = get_sub_field('img');
                                            if ($img) { ?>
                                                <figure class="el_caseList_thmb">
                                                    <img src="<?php echo $img; ?>" alt="" />
                                                </figure>
                                        <?php }
                                        }
                                        ?>
                                        <?php
                                        $themes = get_field('menu_select');
                                        if ($themes):
                                        ?>
                                            <div class="el_caseList_theme">
                                                <?php foreach ($themes as $theme): ?>
                                                    <span><?php echo get_the_title($theme->ID); ?></span>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif;
                                        wp_reset_postdata(); ?>
                                        <p class="el_caseList_ttl"><?php the_title(); ?></p>
                                    </a>
                                </div>
                        <?php endforeach;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <a class="el_btnArrow un_pc" href="<?php echo home_url(); ?>/case/">
                    <span class="el_btnArrow_text">症例一覧</span>
                </a>
            </div>
        </div><!-- /ly_case -->

        <div class="ly_column">
            <div class="ly_inner">
                <div class="ly_news_ttl">
                    <h2 class="el_secTtl_top02">COLUMN</h2>
                    <a class="el_btnArrow un_pc" href="<?php echo home_url(); ?>/column/">
                        <span class="el_btnArrow_text">コラム一覧</span>
                    </a>
                </div>

                <?php
                $custom_posts = get_posts(array(
                    'post_type' => 'column',
                    'posts_per_page' => 4,
                ));
                global $post;
                if ($custom_posts): ?>
                    <div class="ly_news_post">
                        <ul class="el_newsList">
                            <?php foreach ($custom_posts as $post): setup_postdata($post); ?>
                                <li class="el_columnList_item">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <figure class="el_columnList_thmb">
                                                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                                            </figure>
                                        <?php else : ?>
                                            <figure class="el_columnList_thmb">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/no-image.jpg" alt="">
                                            </figure>
                                        <?php endif; ?>
                                        <div class="el_columnList_textWrap">
                                            <p class="el_columnList_ttl"><?php the_title(); ?></p>
                                            <p class="el_columnList_text"><?php echo mb_substr(get_the_excerpt(), 0, 100); ?></p>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach;
                            wp_reset_postdata(); ?>
                        </ul><!-- /el_topics_list -->
                        <a class="el_btnArrow un_sp" href="<?php echo home_url(); ?>/column/">
                            <span class="el_btnArrow_text">コラム一覧</span>
                        </a>
                    </div>
                <?php else : ?>
                    <p class="el_text_ready">準備中</p>
                <?php endif; ?>
            </div>
        </div><!-- /ly_column -->

        <div class="ly_news">
            <div class="ly_inner">
                <div class="ly_news_ttl">
                    <h2 class="el_secTtl_top02">NEWS</h2>
                    <a class="el_btnArrow un_pc" href="<?php echo home_url(); ?>/news/">
                        <span class="el_btnArrow_text">お知らせ一覧</span>
                    </a>
                </div>

                <?php
                $custom_posts = get_posts(array(
                    'post_type' => 'news',
                    'posts_per_page' => 4,
                ));
                global $post;
                if ($custom_posts): ?>
                    <div class="ly_news_post">
                        <ul class="el_newsList">
                            <?php foreach ($custom_posts as $post): setup_postdata($post); ?>
                                <li class="el_newsList_item">
                                    <a href="<?php the_permalink(); ?>">
                                        <time class="el_newsList_date" datetime="<?php echo get_post_time('Y-m-d'); ?>"><?php echo get_post_time('Y.m.d'); ?></time>
                                        <p class="el_newsList_ttl"><?php echo $post->post_title; ?></p>
                                    </a>
                                </li>
                            <?php endforeach;
                            wp_reset_postdata(); ?>
                        </ul><!-- /el_topics_list -->
                        <a class="el_btnArrow un_sp" href="<?php echo home_url(); ?>/news/">
                            <span class="el_btnArrow_text">お知らせ一覧</span>
                        </a>
                    </div>
                <?php else : ?>
                    <p class="el_text_ready">準備中</p>
                <?php endif; ?>
            </div>
        </div><!-- /ly_news -->

    </main><!-- /ly_main -->

    <?php get_footer(); ?>
</body>

</html>