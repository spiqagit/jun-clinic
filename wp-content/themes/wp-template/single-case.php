<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>
<body class="pg_case">
<?php get_header(); ?>

<main class="ly_main">

<div class="el_pageTtlPost">
    <span class="el_pageTtlPost_inner">
        <h1 class="el_pageTtlPost_en">CASE</h1>
        <span class="el_pageTtlPost_ja"><?php the_title(); ?></span>
        <?php
        $themes = get_field('menu_select');
        if( $themes ):
        ?>
        <span class="el_caseList_theme">
        <?php foreach( $themes as $theme ): ?>
            <span><?php echo get_the_title( $theme->ID ); ?></span>
        <?php endforeach; ?>
        </span>
        <?php endif; wp_reset_postdata(); ?>
    </span>
</div><!-- /ly_pageTtl -->



<div class="ly_inner un_case">
    <?php if(have_rows('slide')): ?>
    <div class="el_siderCase">
        <div class="el_siderCase_wrap">
            <div class="js_case_slide">
                <div class="swiper-wrapper">
                    <?php while(have_rows('slide')): the_row(); ?>
                    <div class="swiper-slide">
                        <figure class="el_siderCase_img">
                            <img src="<?php echo get_sub_field('img'); ?>" alt="" />
                        </figure>
                        <p class="el_siderCase_cap"><?php echo get_sub_field('caption'); ?></p>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="swiper-btn-prev">
                <svg width="32" height="64" viewBox="0 0 32 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M32 64L12 64C5.37258 64 -4.69686e-07 58.6274 -1.04907e-06 52L-4.54598e-06 12C-5.12537e-06 5.37258 5.37258 2.32784e-06 12 1.74846e-06L32 0L32 64Z" fill="#4F4643"/>
                    <path d="M22 33C22.5523 33 23 32.5523 23 32C23 31.4477 22.5523 31 22 31L22 33ZM9.29289 31.2929C8.90237 31.6834 8.90237 32.3166 9.29289 32.7071L15.6569 39.0711C16.0474 39.4616 16.6805 39.4616 17.0711 39.0711C17.4616 38.6805 17.4616 38.0474 17.0711 37.6569L11.4142 32L17.0711 26.3431C17.4616 25.9526 17.4616 25.3195 17.0711 24.9289C16.6805 24.5384 16.0474 24.5384 15.6569 24.9289L9.29289 31.2929ZM22 31L10 31L10 33L22 33L22 31Z" fill="white"/>
                </svg>
            </div>
            <div class="swiper-btn-next">
                <svg width="32" height="64" viewBox="0 0 32 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0H20C26.6274 0 32 5.37258 32 12V52C32 58.6274 26.6274 64 20 64H0V0Z" fill="#4F4643"/>
                    <path d="M10 31C9.44772 31 9 31.4477 9 32C9 32.5523 9.44772 33 10 33V31ZM22.7071 32.7071C23.0976 32.3166 23.0976 31.6834 22.7071 31.2929L16.3431 24.9289C15.9526 24.5384 15.3195 24.5384 14.9289 24.9289C14.5384 25.3195 14.5384 25.9526 14.9289 26.3431L20.5858 32L14.9289 37.6569C14.5384 38.0474 14.5384 38.6805 14.9289 39.0711C15.3195 39.4616 15.9526 39.4616 16.3431 39.0711L22.7071 32.7071ZM10 33H22V31H10V33Z" fill="white"/>
                </svg>
            </div>
        </div>
    </div><!-- /el_siderCase -->
    <?php endif; ?>

    <div class="el_edit">
        <?php the_content(); ?>
    </div>
</div><!-- /ly_inner -->


<?php
$current_post_id = get_the_ID();
$menu_select = get_field('menu_select');
if( $menu_select ) {
    $first_post_id = $menu_select[0]->ID;
    $related_query = new WP_Query(array(
        'post_type' => 'case',
        'posts_per_page' => 4,
        'post__not_in' => array($current_post_id),
        'orderby'   => 'rand',
        'meta_query' => array(
            array(
                'key' => 'menu_select',
                'value' => '"' . $first_post_id . '"',
                'compare' => 'LIKE',
            )
        )
    ));
}
    if ($related_query->have_posts()) { ?>
        <div class="bl_relationCase">
        <h2 class="el_textBox_ttl">関連する症例</h2>
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
                    <?php
                    $themes = get_field('menu_select');
                    if( $themes ):
                    ?>
                    <div class="el_caseList_theme">
                    <?php foreach( $themes as $theme ): ?>
                        <span><?php echo get_the_title( $theme->ID ); ?></span>
                    <?php endforeach;?>
                    </div>
                    <?php endif;?>
                    <p class="el_caseList_ttl"><?php the_title(); ?></p>
                </a>
            </li>
        <?php } ?>
        </ul><!-- /el_topics_list -->
        </div>
    <?php } 
    wp_reset_postdata();
?>

</div><!-- /ly_inner -->

</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/library/swiper-bundle.min.css"/>
<script src="<?php echo get_template_directory_uri(); ?>/assets/library/swiper-bundle.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/case.js"></script>

</body>
</html>
