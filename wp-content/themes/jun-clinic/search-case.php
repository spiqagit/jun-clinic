<?php get_header('meta'); ?>
<?php
    global $wp_query;
    $total_results = $wp_query->found_posts;
    $search_query = get_search_query();
    $theme_id = isset($_GET['theme']) ? $_GET['theme'] : null;
    $search_result_string = '';
    if ($theme_id) {
        $args = array(
            'post_type' => 'menu',
            'p' => $theme_id,
        );
        $menu_query = new WP_Query($args);
        if ($menu_query->have_posts()) {
            while ($menu_query->have_posts()) {
                $menu_query->the_post();
                $search_result_string = get_the_title();
            }
            wp_reset_postdata();
        }
    }
    $site_url = get_bloginfo('url');
    $site_title = get_bloginfo('name');
?>
<title>症例 |  CLINIC</title>
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/common/ogp.jpg" />
<meta property="og:image:secure_url" content="<?php echo get_template_directory_uri(); ?>/assets/img/common/ogp.jpg" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="症例 |  CLINIC" />
<meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/common/ogp.jpg" />
<?php wp_head(); ?>
</head>
<body class="pg_case">
<?php get_header(); ?>

<main class="ly_main">

<hgroup class="el_pageTtl">
    <h1 class="el_pageTtl_en">CASE</h1>
    <p class="el_pageTtl_ja">症例</p>
</hgroup><!-- /el_pageTtl -->

<div class="ly_2col un_case">
    <div class="el_casePosts">
        <?php
            $paged = get_query_var('paged')? get_query_var('paged') : 1;
            $my_query = new WP_Query( array(
                'paged' => $paged,
                'posts_per_page' => 12,
                's' => $s,
                'post_type' => 'case',
                'meta_query' => array(
                    array(
                        'key' => 'menu_select',
                        'value' => '"' . $theme_id . '"',
                        'compare' => 'LIKE',
                    ),
                ),
            ));
        ?>
        <?php
            $ppp   = -1;
            $count = $total = $my_query->post_count;
            $from  = 0;
            $total = $my_query->found_posts;
        ?>
        <?php if( 0 !== $count): ?>
            <ul class="el_caseList">
                <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <li class="el_caseList_item">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if( have_rows('slide') ) {
                            the_row();
                            $img = get_sub_field('img');
                            if( $img ) { ?>
                            <figure class="el_caseList_thmb">
                                <img src="<?php echo $img; ?>" alt="" />
                            </figure>
                            <?php }
                        }
                        ?>
                        <?php
                        $themes = get_field('menu_select');
                        if( $themes ):
                        ?>
                        <div class="el_caseList_theme">
                        <?php foreach( $themes as $theme ): ?>
                            <span><?php echo get_the_title( $theme->ID ); ?></span>
                        <?php endforeach; ?>
                        </div>
                        <?php endif; wp_reset_postdata(); ?>
                        <p class="el_caseList_ttl"><?php the_title(); ?></p>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul><!-- /el_topics_list -->
        <?php else: ?>
            <p class="bl_none_content">該当する記事がありません。</p>
        <?php endif; ?>
        <div class="el_pager">
        <?php
        $total_pages = $my_query->max_num_pages;
        $current_page = max(1, get_query_var('paged'));
        the_posts_pagination(array(
            'mid_size' => 0,
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text' => __('<svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none"><path d="M0.646446 4.85355C0.451185 4.65829 0.451185 4.34171 0.646446 4.14645L3.82843 0.964466C4.02369 0.769204 4.34027 0.769204 4.53553 0.964466C4.7308 1.15973 4.7308 1.47631 4.53553 1.67157L1.70711 4.5L4.53553 7.32843C4.7308 7.52369 4.7308 7.84027 4.53553 8.03553C4.34027 8.2308 4.02369 8.2308 3.82843 8.03553L0.646446 4.85355ZM17 5H1V4H17V5Z" fill="#222222"/></svg><span class="el_pager_text">PREV</span>', 'textdomain'),
            'next_text' => __('<span class="el_pager_text">NEXT</span><svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none"><path d="M16.3536 4.85355C16.5488 4.65829 16.5488 4.34171 16.3536 4.14645L13.1716 0.964466C12.9763 0.769204 12.6597 0.769204 12.4645 0.964466C12.2692 1.15973 12.2692 1.47631 12.4645 1.67157L15.2929 4.5L12.4645 7.32843C12.2692 7.52369 12.2692 7.84027 12.4645 8.03553C12.6597 8.2308 12.9763 8.2308 13.1716 8.03553L16.3536 4.85355ZM0 5H16V4H0V5Z" fill="#222222"/></svg>', 'textdomain'),
        ));
        ?>
        </div><!-- /el_pager -->    
    </div><!-- /el_casePosts -->
    <div class="el_caseSide">
        <p class="el_caseSide_ttl">美容皮膚科</p>
        <?php
        $displayed_posts = array();
        $columns = get_posts(array(
            'post_type' => 'case',
            'posts_per_page' => -1,
        ));
        if (!empty($columns)) {
            echo '<div class="el_sideSelect" ><select name="dermatology" onchange="location.href=value;">';
            
            // デフォルトのオプションを設定
            $default_option = '<option value="" selected disabled>施術を選ぶ</option>';
            
            $options = '';
            $matched_option = '';
            
            foreach ($columns as $column) {
                $related_menus = get_field('menu_select', $column->ID);
                if (!empty($related_menus)) {
                    foreach ($related_menus as $menu) {
                        $terms = wp_get_post_terms($menu->ID, 'menu-cat');
                        foreach ($terms as $term) {
                            if ($term->slug === 'dermatology') {
                                if (!in_array($menu->ID, $displayed_posts)) {
                                    $displayed_posts[] = $menu->ID;
                                    $menu_title = get_the_title($menu->ID);
                                    $option = '<option value="' . home_url() . '/case/?s=&theme=' . $menu->ID . '"';
                                    
                                    // $search_result_stringと一致する場合
                                    if ($menu_title === $search_result_string) {
                                        $option .= ' selected';
                                        $matched_option = $option . '>' . $menu_title . '</option>';
                                        $default_option = ''; // デフォルトオプションを削除
                                    } else {
                                        $options .= $option . '>' . $menu_title . '</option>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
            
            // 出力順序: デフォルトオプション → マッチしたオプション → その他のオプション
            echo $default_option . $matched_option . $options;
            
            echo '</select></div>';
        }
        wp_reset_postdata();
        ?>
        <p class="el_caseSide_ttl">美容外科</p>
        
        <?php
        $displayed_posts = array();
        $columns = get_posts(array(
            'post_type' => 'case',
            'posts_per_page' => -1,
        ));
        if (!empty($columns)) {
            echo '<div class="el_sideSelect" ><select name="dermatology" onchange="location.href=value;">';
            
            // デフォルトのオプションを設定
            $default_option = '<option value="" selected disabled>施術を選ぶ</option>';
            
            $options = '';
            $matched_option = '';
            
            foreach ($columns as $column) {
                $related_menus = get_field('menu_select', $column->ID);
                if (!empty($related_menus)) {
                    foreach ($related_menus as $menu) {
                        $terms = wp_get_post_terms($menu->ID, 'menu-cat');
                        foreach ($terms as $term) {
                            if ($term->slug === 'surgery') {
                                if (!in_array($menu->ID, $displayed_posts)) {
                                    $displayed_posts[] = $menu->ID;
                                    $menu_title = get_the_title($menu->ID);
                                    $option = '<option value="' . home_url() . '/case/?s=&theme=' . $menu->ID . '"';
                                    
                                    // $search_result_stringと一致する場合
                                    if ($menu_title === $search_result_string) {
                                        $option .= ' selected';
                                        $matched_option = $option . '>' . $menu_title . '</option>';
                                        $default_option = ''; // デフォルトオプションを削除
                                    } else {
                                        $options .= $option . '>' . $menu_title . '</option>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
            
            // 出力順序: デフォルトオプション → マッチしたオプション → その他のオプション
            echo $default_option . $matched_option . $options;
            
            echo '</select></div>';
        }
        wp_reset_postdata();
        ?>
    </div><!-- /el_caseSide -->
</div><!-- /ly_2col -->

</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

</body>
</html>
