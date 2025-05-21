<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>
<body class="pg_menu">
<?php get_header(); ?>

<main class="ly_main">

<hgroup class="el_pageTtl">
    <h1 class="el_pageTtl_en">MENU</h1>
    <p class="el_pageTtl_ja">施術メニュー</p>
</hgroup><!-- /el_pageTtl -->

<div class="ly_inner un_menu">

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
        if($custom_posts): foreach($custom_posts as $post): setup_postdata($post); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endforeach; wp_reset_postdata(); endif; ?>
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

</div><!-- /ly_inner -->

</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

</body>
</html>
