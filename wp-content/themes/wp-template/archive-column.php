<?php get_header('meta'); ?>
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
        <?php if (have_posts()) : ?>
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
        <?php else : ?>
            <p class="el_text_ready">準備中</p>
        <?php endif; ?>

        <div class="el_pager">
        <?php
        the_posts_pagination(array(
            'mid_size' => 0,
            'prev_text' => __('<svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none"><path d="M0.646446 4.85355C0.451185 4.65829 0.451185 4.34171 0.646446 4.14645L3.82843 0.964466C4.02369 0.769204 4.34027 0.769204 4.53553 0.964466C4.7308 1.15973 4.7308 1.47631 4.53553 1.67157L1.70711 4.5L4.53553 7.32843C4.7308 7.52369 4.7308 7.84027 4.53553 8.03553C4.34027 8.2308 4.02369 8.2308 3.82843 8.03553L0.646446 4.85355ZM17 5H1V4H17V5Z" fill="#222222"/></svg><span class="el_pager_text">PREV</span>', 'textdomain'),
            'next_text' => __('<span class="el_pager_text">NEXT</span><svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none"><path d="M16.3536 4.85355C16.5488 4.65829 16.5488 4.34171 16.3536 4.14645L13.1716 0.964466C12.9763 0.769204 12.6597 0.769204 12.4645 0.964466C12.2692 1.15973 12.2692 1.47631 12.4645 1.67157L15.2929 4.5L12.4645 7.32843C12.2692 7.52369 12.2692 7.84027 12.4645 8.03553C12.6597 8.2308 12.9763 8.2308 13.1716 8.03553L16.3536 4.85355ZM0 5H16V4H0V5Z" fill="#222222"/></svg>', 'textdomain'),
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
        if ( !empty($terms) && !is_wp_error($terms) ) {
            echo '<ul class="el_columnSide_key">';
            foreach ( $terms as $term ) {
                echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a></li>';
            }
            echo '</ul>';
        } wp_reset_postdata();
        ?>

    </div><!-- /el_columnSide -->
</div><!-- /ly_2col -->

</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

</body>
</html>
