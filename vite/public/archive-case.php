<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>

<body class="pg_price">
    <div class="bl_commonBgContainer">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/bg.png" alt="">
    </div>
    <?php get_header(); ?>

    <main class="ly_commonPage ly_overBg">

        <div class="bl_commonPageTtlContainer">
            <?php get_template_part('inc/breadcrumbs'); ?>
            <div class="bl_commonPageTtlContainer_inner">
                <h1 class="el_commonPageTtlContainer_inner_ttl">症例</h1>
            </div>
            <picture class="el_commonPageTtlContainer_waveLine">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/page-wave-line-sp.png" media="(max-width: 768px)">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/page-wave-line.png" alt="">
            </picture>
        </div>

        <div class="ky">
            <div class="bl_commonPageTtlContainer">
                    <div class="bl_priceSec_seideMenuContainer_list">
                        <div class="bl_priceSec_seideMenuContainer_item">
                            <p class="el_priceSec_seideMenuContainer_item_ttl"></p>
                            <div class="bl_priceSec_seideMenuContainer_item_selectContainer">
                                <select name="menu-cat" id="menu-cat-select" onchange="if(this.value) window.location.href=this.value" class="bl_priceSec_seideMenuContainer_item_select">
                                    <option value="" class="el_priceSec_seideMenuContainer_item_select_first">施術を選ぶ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $args = array(
                'post_type' => 'case',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            ?>
            <?php if ($query->have_posts()) : ?>
                <div class="bl_caseList_item_list">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="bl_caseList_item_btn">
                            <div class="bl_caseList_item_imgContainer">
                                <?php if (have_rows('slide')): ?>
                                    <?php
                                    $i = 0;
                                    while (have_rows('slide')): the_row();
                                        if ($i === 0): ?>
                                            <img class="bl_caseList_item_imgContainer_img" src="<?php the_sub_field('img'); ?>" alt="<?php the_title(); ?>">
                                    <?php
                                        endif;
                                        $i++;
                                    endwhile;
                                    ?>
                                <?php else: ?>
                                    <img class="bl_caseList_item_imgContainer_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/no-post.jpg" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>

                            <div class="bl_caseList_item_txtContainer">
                                <div class="bl_bl_caseList_item_txtContainer_tagList">
                                    <?php
                                    $menu_select = get_field('menu_select');
                                    ?>

                                    <?php if (!empty($menu_select)) : ?>
                                        <?php foreach ($menu_select as $menu_selectPost) : ?>
                                            <p class="el_caseList_item_txtContainer_tagList_item">#<?php echo esc_html(get_the_title($menu_selectPost)); ?></p>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <p class="bl_caseList_item_txtContainer_ttl"><?php the_title(); ?></p>
                            </div>

                            <dl class="bl_caseList_item_caseInfo">
                                <?php
                                $caseInfoSlugList = ["case-price", "case-time", "case-downtime", "case-makeup", "case-risk"];
                                foreach ($caseInfoSlugList as $caseInfoSlug):
                                    $field_object = get_field_object($caseInfoSlug, get_the_ID());
                                    $price = get_field($caseInfoSlug, get_the_ID());

                                    if ($price):
                                ?>
                                        <div class="bl_caseList_item_caseInfo_item">
                                            <dt class="bl_caseList_item_caseInfo_item_dt">
                                                <?php echo esc_html($field_object['label']); ?>
                                            </dt>
                                            <dd class="bl_caseList_item_caseInfo_item_dd">
                                                <?php echo esc_html($price); ?>
                                            </dd>
                                        </div>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </dl>
                        </a>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <?php get_footer(); ?>

</body>

</html>