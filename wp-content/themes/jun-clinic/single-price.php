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
                <h1 class="el_commonPageTtlContainer_inner_ttl">料金表</h1>
            </div>
            <picture class="el_commonPageTtlContainer_waveLine">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/page-wave-line-sp.svg" media="(max-width: 768px)">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/page-wave-line.svg" alt="">
            </picture>
        </div>

        <div class="bl_priceSec">
            <div class="bl_priceSec_inner">
                <div class="bl_priceSec_seideMenuContainer">
                    <div class="bl_priceSec_seideMenuContainer_list">
                        <?php
                        $menuTermList = get_terms(array(
                            'taxonomy' => 'menu-cat',
                            'hide_empty' => true,
                            'parent' => 0,
                            'orderby' => 'menu_order',
                            'order' => 'ASC'
                        ));

                        // price投稿タイプに関連するタームのみをフィルタリング
                        if (!empty($menuTermList) && !is_wp_error($menuTermList)) {

                            $filteredTerms = array();

                            foreach ($menuTermList as $term) {
                                $posts = get_posts(array(
                                    'post_type' => 'price',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'menu-cat',
                                            'field' => 'term_id',
                                            'terms' => $term->term_id
                                        )
                                    )
                                ));
                                if (!empty($posts)) {
                                    $filteredTerms[] = $term;
                                }
                            }
                            $menuTermList = $filteredTerms;
                        }
                        ?>
                        <?php
                        if (!empty($menuTermList) && !is_wp_error($menuTermList)) :
                            foreach ($menuTermList as $menuTerm) : ?>
                                <div class="bl_priceSec_seideMenuContainer_item">
                                    <p class="el_priceSec_seideMenuContainer_item_ttl"><?php echo esc_html($menuTerm->name); ?></p>
                                    <div class="bl_priceSec_seideMenuContainer_item_selectContainer">
                                        <select name="menu-cat" id="menu-cat-select" onchange="if(this.value) window.location.href=this.value" class="bl_priceSec_seideMenuContainer_item_select">
                                            <option value="" class="el_priceSec_seideMenuContainer_item_select_first">施術を選ぶ</option>
                                            <option value="<?php echo home_url('//'); ?>" class="el_priceSec_seideMenuContainer_item_select_first">すべて</option>

                                            <?php
                                            $arg = array(
                                                'post_type' => 'price',
                                                'taxonomy' => 'menu-cat',
                                                'hide_empty' => true,
                                                'parent' => $menuTerm->term_id,
                                                'orderby' => 'menu_order',
                                                'order' => 'ASC'
                                            );
                                            $query = new WP_Query($arg);
                                            ?>

                                            <?php if ($query->have_posts()) : ?>
                                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                                    <option value="<?php echo get_the_permalink(); ?>" <?php selected(get_queried_object_id(), get_the_ID()); ?>>
                                                        <?php the_title(); ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                        </select>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                    <p class="el_priceSec_seideMenuContainer_txt">※料金はすべて税込価格です。</p>
                </div>

                <!-- 料金表 -->
                <div class="bl_priceContentsContainer">
                    <?php
                    $clinicTermList = get_terms(array(
                        'taxonomy' => 'clinic-cat',
                        'hide_empty' => true,
                        'orderby' => 'menu_order',
                        'order' => 'ASC'
                    ));

                    // price投稿タイプに関連するタームのみをフィルタリング
                    if (!empty($clinicTermList) && !is_wp_error($clinicTermList)) {
                        $filteredTerms = array();
                        foreach ($clinicTermList as $term) {
                            $posts = get_posts(array(
                                'post_type' => 'price',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'clinic-cat',
                                        'field' => 'term_id',
                                        'terms' => $term->term_id
                                    )
                                )
                            ));
                            if (!empty($posts)) {
                                $filteredTerms[] = $term;
                            }
                        }
                        $clinicTermList = $filteredTerms;
                    }
                    $i = 0;
                    ?>
                    <ul class="bl_priceListContainer_clinicBtnList">
                        <?php if (!empty($clinicTermList) && !is_wp_error($clinicTermList)) : ?>
                            <?php foreach ($clinicTermList as $clinicTerm) : ?>

                                <?php
                                if ($i == 0) {
                                    $isActive = 'is-active';
                                } else {
                                    $isActive = '';
                                }
                                ?>
                                <li class="bl_priceListContainer_clinicBtnList_item">
                                    <button class="el_priceSec_seideMenuContainer_item_select_btn <?php echo $isActive; ?>" id="<?php echo esc_attr($clinicTerm->slug); ?>" type="button">
                                        <?php echo esc_html($clinicTerm->name); ?>
                                    </button>
                                </li>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>


                    <?php $c = 0; ?>
                    <?php if (!empty($clinicTermList) && !is_wp_error($clinicTermList)) : ?>

                        <?php foreach ($clinicTermList as $clinicTerm) : ?>

                            <?php if ($c == 0) {
                                $isActive = 'is_priceListContainerActive';
                            } else {
                                $isActive = '';
                            } ?>
                            <div class="bl_priceListContainer <?php echo $isActive; ?>" data-clinic="<?php echo esc_attr($clinicTerm->slug); ?>">

                                <?php
                                $priceTermList = get_terms(array(
                                    'taxonomy' => 'menu-cat',
                                    'hide_empty' => true,
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC',
                                    'parent' => 0
                                ));

                                if (!empty($priceTermList) && !is_wp_error($priceTermList)) {
                                    $filteredTerms = array();
                                    foreach ($priceTermList as $term) {
                                        $posts = get_posts(array(
                                            'post_type' => 'price',
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'menu-cat',
                                                    'field' => 'term_id',
                                                    'terms' => $term->term_id
                                                )
                                            )
                                        ));
                                        if (!empty($posts)) {
                                            $filteredTerms[] = $term;
                                        }
                                    }
                                    $priceTermList = $filteredTerms;
                                }
                                ?>

                                <?php if (!empty($priceTermList) && !is_wp_error($priceTermList)) : ?>

                                    <ul class="bl_priceListContainer_priceList_largeList">

                                        <?php foreach ($priceTermList as $priceTerm) : ?>

                                            <?php
                                            $args = array(
                                                'post_type' => 'price',
                                                'posts_per_page' => -1,
                                                'tax_query' => array(
                                                    'relation' => 'AND',
                                                    array(
                                                        'taxonomy' => 'menu-cat',
                                                        'field' => 'term_id',
                                                        'terms' => $priceTerm->term_id
                                                    ),
                                                    array(
                                                        'taxonomy' => 'clinic-cat',
                                                        'field' => 'term_id',
                                                        'terms' => $clinicTerm->term_id
                                                    )
                                                )
                                            );
                                            $query = new WP_Query($args);
                                            ?>

                                            <?php if ($query->have_posts()) : ?>


                                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                                    <li class="bl_priceListContainer_priceList_largeList_item">
                                                        <h2 class="bl_priceListContainer_priceList_largeList_item_ttl"><?php the_title(); ?></h2>

                                                        <?php if (have_rows('price_wrap')) : ?>
                                                            <ul class="bl_priceListContainer_priceList_smallList">

                                                                <?php while (have_rows('price_wrap')) : the_row(); ?>

                                                                    <li class="bl_priceListContainer_priceList_smallist_item">

                                                                        <h3 class="el_priceListContainer_priceList_smallList_post_ttl"><?php echo get_sub_field('left'); ?></h3>

                                                                        <?php if (have_rows('price_table')) : ?>

                                                                            <ul class="bl_priceTableList">

                                                                                <?php while (have_rows('price_table')) : the_row(); ?>

                                                                                    <li class="bl_priceTableList_item">
                                                                                        <div class="bl_priceTableList_item_innerContainer">

                                                                                            <div class="bl_priceTableList_item_innerContainer_left">
                                                                                                <?php if (get_sub_field('price_table-ttl')) : ?>
                                                                                                    <p class="el_priceTableList_item_innerContainer_left_txt"><?php echo get_sub_field('price_table-ttl'); ?></p>
                                                                                                <?php endif; ?>
                                                                                            </div>

                                                                                            <div class="bl_priceTableList_item_innerContainer_right">
                                                                                                <?php if (have_rows('amount-table')) : ?>
                                                                                                    <?php while (have_rows('amount-table')) : the_row(); ?>

                                                                                                        <div class="bl_priceTableList_item_innerContainer_right_container">
                                                                                                            <div class="bl_priceTableList_item_innerContainer_right_txtContainer">
                                                                                                                <?php if (get_sub_field('amount-table_txt')) : ?>
                                                                                                                    <p><?php echo get_sub_field('amount-table_txt'); ?></p>
                                                                                                                <?php endif; ?>
                                                                                                            </div>

                                                                                                            <div class="bl_priceTableList_item_innerContainer_right_container_table">
                                                                                                                <div class="bl_priceTableList_item_innerContainer_right_txtContainer">
                                                                                                                    <?php if (get_sub_field('amount-table_view')) : ?>
                                                                                                                        <p class="el_priceTableList_item_innerContainer_right_txtContainer_view"><?php echo get_sub_field('amount-table_view'); ?></p>
                                                                                                                    <?php endif; ?>
                                                                                                                </div>

                                                                                                                <div class="bl_priceTableList_item_innerContainer_right_txtContainer bl_priceTableList_item_innerContainer_right_txtContainer_num">
                                                                                                                    <?php if (get_sub_field('amount-table_num')) : ?>
                                                                                                                        <p class="el_priceTableList_item_innerContainer_right_txt"><?php echo get_sub_field('amount-table_num'); ?></p>
                                                                                                                    <?php endif; ?>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <?php endwhile; ?>
                                                                                                <?php endif; ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                <?php endwhile; ?>
                                                                            </ul>
                                                                        <?php endif; ?>


                                                                        <?php if (get_sub_field('price-caption')) : ?>
                                                                            <p class="el_priceListContainer_priceList_smallList_post_caption"><?php echo get_sub_field('price-caption'); ?></p>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                <?php endwhile; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                            <?php wp_reset_postdata(); ?>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <?php $c++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <?php get_footer(); ?>

</body>

</html>