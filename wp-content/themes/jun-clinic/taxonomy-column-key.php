<?php get_header('meta'); ?>
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/common/ogp.jpg" />
<meta property="og:image:secure_url" content="<?php echo get_template_directory_uri(); ?>/assets/img/common/ogp.jpg" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="コラム | " />
<meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/common/ogp.jpg" />
<?php wp_head(); ?>
</head>
<body class="pg_column">
<?php get_header(); ?>

<main class="ly_main">

<hgroup class="el_pageTtl">
    <h1 class="el_pageTtl_en">COLUMN</h1>
    <p class="el_pageTtl_ja">コラム</p>
</hgroup><!-- /el_pageTtl -->

<div class="ly_2col un_column">
    <div class="el_columnPosts">
        <ul class="el_columnList">
            <?php while (have_posts()) : the_post(); ?>
                <li class="el_columnList_item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <figure class="el_columnList_thmb">
                                <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="">
                            </figure>
                        <?php else : ?>
                            <figure class="el_columnList_thmb">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/no-image.jpg" alt="">
                            </figure>
                        <?php endif; ?>
                        <p class="el_columnList_ttl"><?php the_title(); ?></p>
                        <?php
                        $themes = get_field('menu_select');
                        if( $themes ):
                        ?>
                        <div class="el_columnList_theme">
                        <?php foreach( $themes as $theme ): ?>
                            <span><?php echo get_the_title( $theme->ID ); ?></span>
                        <?php endforeach; ?>
                        </div>
                        <?php endif; wp_reset_postdata(); ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul><!-- /el_topics_list -->

        <div class="el_pager">
        <?php
        the_posts_pagination(array(
            'mid_size' => 0,
            'prev_text' => __('<span class="el_pager_text">PREV</span>', 'textdomain'),
            'next_text' => __('<span class="el_pager_text">NEXT</span>', 'textdomain'),
        ));
        ?>
        </div><!-- /el_pager -->    
    </div><!-- /el_columnPosts -->
    <div class="el_columnSide">
        <p class="el_columnSide_ttl">
            <span class="el_columnSide_ttl_en">THEME</span>
            <span class="el_columnSide_ttl_ja">テーマ</span>
        </p>
        <?php
        $displayed_posts = array();
        $columns = get_posts(array(
            'post_type' => 'column',
            'posts_per_page' => -1,
        ));
        if (!empty($columns)) {
            echo '<ul class="el_columnSide_theme">';
            foreach ($columns as $column) {
                $related_menus = get_field('menu_select', $column->ID);
                if (!empty($related_menus)) {
                    foreach ($related_menus as $menu) {
                        if (!in_array($menu->ID, $displayed_posts)) {
                            $displayed_posts[] = $menu->ID;
                            echo '<li><a href="' . home_url() . '/column/?s=&theme=' . $menu->ID . '">' . get_the_title($menu->ID) . '</a></li>';
                        }
                    }
                }
            }
            echo '</ul>';
        } wp_reset_postdata();
        ?>
        <p class="el_columnSide_ttl">
            <span class="el_columnSide_ttl_en">KEYWORD</span>
            <span class="el_columnSide_ttl_ja">キーワード</span>
        </p>
        <?php
        $terms = get_terms( array(
            'taxonomy' => 'column-key',
            'hide_empty' => true,
        ) );
        $current_term = get_queried_object();
        if ( !empty($terms) && !is_wp_error($terms) ) {
            echo '<ul class="el_columnSide_key">';
            foreach ( $terms as $term ) {
                $is_active = ($current_term && $current_term->term_id === $term->term_id) ? ' class="is_active"' : '';
                echo '<li' . $is_active . '><a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a></li>';
            }
            echo '</ul>';
        }
        wp_reset_postdata();
        ?>
    </div><!-- /el_columnSide -->
</div><!-- /ly_2col -->

</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

</body>
</html>
