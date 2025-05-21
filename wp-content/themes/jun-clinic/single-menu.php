<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>
<body class="pg_menu">
<?php get_header(); ?>

<main class="ly_main">



<div class="el_pageTtlPost">
    <hgroup class="el_pageTtlPost_inner">
        <span class="el_pageTtlPost_en">MENU</span>
        <h1 class="el_pageTtlPost_ja"><?php the_title(); ?></h1>
    </hgroup>
</div><!-- /el_pageTtlPost -->

<div class="ly_inner un_menuSingle">
    <div class="el_edit">

        <div id="toc_container">
            <p class="toc_title">INDEX</p>
            <ul class="toc_list"></ul>
        </div>
        
        <?php the_content(); ?>
        
        <?php
        $current_post_id = get_the_ID();
            $related_query = new WP_Query(array(
                'post_type' => 'case',
                'posts_per_page' => 3,
                'post__not_in' => array($current_post_id),
                'meta_query' => array(
                    array(
                        'key' => 'menu_select',
                        'value' => '"' . $current_post_id . '"',
                        'compare' => 'LIKE',
                    )
                )
            ));
            if ($related_query->have_posts()) { ?>
                <h2>症例</h2>
                <ul class="el_caseList">
                <?php while ($related_query->have_posts()) {
                    $related_query->the_post();
                ?>
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
                            <p class="el_caseList_ttl"><?php the_title(); ?></p>
                        </a>
                    </li>
                <?php } ?>
                </ul><!-- /el_topics_list -->
                <a class="el_btnArrow un_right" href="<?php echo home_url(); ?>/case/?s=&theme=<?php echo $current_post_id;?>">
                    <span class="el_btnArrow_text">症例を全て見る</span>
                </a>
            <?php } 
            wp_reset_postdata();
        ?>

        <?php
        $current_post_id = get_the_ID();
            $related_query = new WP_Query(array(
                'post_type' => 'price',
                'posts_per_page' => -1,
                'post__not_in' => array($current_post_id),
                'meta_query' => array(
                    array(
                        'key' => 'menu_select',
                        'value' => '"' . $current_post_id . '"',
                        'compare' => 'LIKE',
                    )
                )
            ));
            if ($related_query->have_posts()) { ?>
                <h2>料金表</h2>
                <?php while ($related_query->have_posts()) {
                    $related_query->the_post();
                ?>
                <?php while(have_rows('price_wrap')): the_row(); ?>
                <?php if(get_sub_field('ttl')): ?>
                    <h3 class="el_priceTable_ttl"><?php echo get_sub_field('ttl'); ?></h3>
                <?php endif; ?>
                <dl class="el_priceTable">
                    <?php while(have_rows('price_table')): the_row(); ?>
                        <div class="el_priceTable_dd<?php if (!get_sub_field('left')): ?> un_empty<?php endif; ?>">
                            <dt><?php echo get_sub_field('left'); ?></dt>
                            <dd><?php echo get_sub_field('center'); ?></dd>
                            <dd><?php if(get_sub_field('price_view')): ?><?php echo get_sub_field('price_view'); ?><?php endif; ?></dd>
                            <dd><?php echo get_sub_field('right'); ?></dd>
                        </div>
                    <?php endwhile; ?>
                </dl>
                <?php if(get_sub_field('information')): ?>
                    <div class="el_priceTable_info"><?php echo get_sub_field('information'); ?></div>
                <?php endif; ?>
                <?php endwhile; ?>
                <?php } ?>
            <?php } 
            wp_reset_postdata();
        ?>

        <?php
        $current_post_id = get_the_ID();
            $related_query = new WP_Query(array(
                'post_type' => 'column',
                'posts_per_page' => 3,
                'post__not_in' => array($current_post_id),
                'meta_query' => array(
                    array(
                        'key' => 'menu_select',
                        'value' => '"' . $current_post_id . '"',
                        'compare' => 'LIKE',
                    )
                )
            ));
            if ($related_query->have_posts()) { ?>
                <h2>関連記事</h2>
                <div class="el_menuColumn">
                    <ul class="el_menuColumn_list">
                    <?php while ($related_query->have_posts()) {
                        $related_query->the_post();
                    ?>
                        <li class="el_menuColumn_list_item">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <figure class="el_menuColumn_list_thmb">
                                        <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="">
                                    </figure>
                                <?php else : ?>
                                    <figure class="el_menuColumn_list_thmb">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/no-image.jpg" alt="">
                                    </figure>
                                <?php endif; ?>
                                <p class="el_menuColumn_list_ttl"><?php the_title(); ?></p>
                            </a>
                        </li>
                    <?php } ?>
                    </ul><!-- /el_topics_list -->
                    <a class="el_btnArrow un_right" href="<?php echo home_url(); ?>/column/?s=&theme=<?php echo $current_post_id;?>">
                        <span class="el_btnArrow_text">記事を全て見る</span>
                    </a>
                </div>
            <?php } 
            wp_reset_postdata();
        ?>
        
        
        <?php
        $connection_posts = get_field('menu_connection');
            if( $connection_posts ): ?>
                <h2>おすすめの組み合わせ</h2>
                <div class="el_menuColumn">
                <ul class="el_menuColumn_list">
                <?php foreach( $connection_posts as $connection_post ): ?>
                    <li class="el_menuColumn_list_item">
                        <a href="<?php echo get_permalink( $connection_post->ID ); ?>">
                            <?php if(get_field('main_img',$connection_post->ID)): ?>
                                <figure class="el_menuColumn_list_thmb">
                                    <img src="<?php the_field('main_img',$connection_post->ID); ?>" alt="">
                                </figure>
                            <?php else : ?>
                                <figure class="el_menuColumn_list_thmb">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/no-image.jpg" alt="">
                                </figure>
                            <?php endif; ?>
                            <p class="el_menuColumn_list_ttl"><?php echo get_the_title( $connection_post->ID ); ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul><!-- /el_topics_list -->
                </div>
            <?php endif;
            wp_reset_postdata();
        ?>

        <?php if(have_rows('menu_info')): ?>
            <h2>基本情報</h2>
            <figure class="wp-block-table">
                <table class="has-fixed-layout">
                    <tbody>
                    <?php while(have_rows('menu_info')): the_row(); ?>
                        <tr>
                            <td><?php echo get_sub_field('ttl'); ?></td>
                            <td><?php echo get_sub_field('text'); ?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </figure>
        <?php endif; ?>
    </div>

    <a href="<?php echo home_url(); ?>/menu/" class="el_btnNormal">一覧へ戻る</a>

</div><!-- /ly_inner -->


</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/library/swiper-bundle.min.css"/>
<script src="<?php echo get_template_directory_uri(); ?>/assets/library/swiper-bundle.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/menu.js"></script>

</body>
</html>
