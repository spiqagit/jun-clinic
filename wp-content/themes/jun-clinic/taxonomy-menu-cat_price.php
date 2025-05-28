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

                                            <?php
                                            $subMenuTermList = get_terms(array(
                                                'taxonomy' => 'menu-cat',
                                                'hide_empty' => true,
                                                'parent' => $menuTerm->term_id,
                                                'orderby' => 'menu_order',
                                                'order' => 'ASC'
                                            ));

                                            // price投稿タイプに関連するタームのみをフィルタリング
                                            if (!empty($subMenuTermList) && !is_wp_error($subMenuTermList)) {
                                                $filteredSubTerms = array();
                                                foreach ($subMenuTermList as $term) {
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
                                                        $filteredSubTerms[] = $term;
                                                    }
                                                }
                                                $subMenuTermList = $filteredSubTerms;
                                            }
                                            ?>
                                            <?php
                                            if (!empty($subMenuTermList) && !is_wp_error($subMenuTermList)) :
                                                foreach ($subMenuTermList as $subMenuTerm) : ?>
                                                    <option value="<?php echo esc_url( get_term_link($term) . '?type=price' ); ?>" <?php selected(get_queried_object_id(), $subMenuTerm->term_id); ?>>
                                                        <?php echo esc_html($subMenuTerm->name); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                        </select>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                    <p class="el_priceSec_seideMenuContainer_txt">※料金はすべて税込価格です。</p>
                </div>

                <!-- menu-cat（施術）で絞り込みフォーム -->
                <form method="get" action="">
                    <select name="menu-cat">
                        <option value="">すべての施術</option>
                        <?php
                        $menu_terms = get_terms(array(
                            'taxonomy' => 'menu-cat',
                            'hide_empty' => true,
                            'parent' => 0,
                            'orderby' => 'menu_order',
                            'order' => 'ASC'
                        ));
                        foreach ($menu_terms as $term) {
                            $selected = (isset($_GET['menu-cat']) && $_GET['menu-cat'] == $term->slug) ? 'selected' : '';
                            echo '<option value="' . esc_attr($term->slug) . '" ' . $selected . '>' . esc_html($term->name) . '</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" value="絞り込む">
                    <input type="hidden" name="type" value="price">
                </form>

                <!-- 料金表 -->
                <div class="bl_priceContentsContainer">
                    <?php
                    $tax_query = array();
                    if (!empty($_GET['menu-cat'])) {
                        $tax_query[] = array(
                            'taxonomy' => 'menu-cat',
                            'field'    => 'slug',
                            'terms'    => sanitize_text_field($_GET['menu-cat']),
                        );
                    } else {
                        $tax_query[] = array(
                            'taxonomy' => 'menu-cat',
                            'field'    => 'slug',
                            'terms'    => get_queried_object()->slug,
                        );
                    }
                    $args = array(
                        'post_type' => 'price',
                        'tax_query' => $tax_query,
                    );
                    $query = new WP_Query($args);
                    ?>
                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <!-- 投稿の表示例 -->
                            <div class="price-item">
                                <h2><?php the_title(); ?></h2>
                                <div><?php the_content(); ?></div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p>該当する投稿はありません。</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <?php get_footer(); ?>

</body>

</html>