<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>
<body class="pg_price">
<?php get_header(); ?>

<main class="ly_main">

<hgroup class="el_pageTtl">
    <h1 class="el_pageTtl_en">PRICE</h1>
    <p class="el_pageTtl_ja">料金表</p>
</hgroup><!-- /el_pageTtl -->

<div class="ly_2col un_price">
    <div class="el_pricePosts">
        <p class="el_pricePosts_sub">※料金はすべて税込です</p>
        <div class="el_pricePosts_wrap">
            <h2 class="el_pricePosts_ttl"><?php the_title(); ?></h2>
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
        </div>
    </div><!-- /el_pricePosts -->
    <div class="el_priceSide">

        <!-- 美容皮膚科 -->
        <?php
        $custom_posts = get_posts(array(
        'post_type' => 'price',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
            'taxonomy' => 'price-cat',
            'field' => 'slug',
            'terms' => 'dermatology',
            'operator' => 'IN'
            ),
            )
        ));
        global $post;
        if($custom_posts):
        echo '<p class="el_priceSide_ttl">美容皮膚科</p><div class="el_sideSelect" ><select name="dermatology" onchange="location.href=value;"><option value="" selected="" disabled="">施術を選ぶ</option>';
        $current_post_title = get_the_title();
        $current_post_url = get_permalink();
        $matched = false;
        foreach($custom_posts as $post):
            setup_postdata($post);
            if ($current_post_title === get_the_title()) {
                $matched = true;
                echo '<option value="' . esc_url($current_post_url) . '" selected>' . esc_html($current_post_title) . '</option>';
            }
        endforeach;
        foreach($custom_posts as $post):
            setup_postdata($post);
            if ($current_post_title !== get_the_title()) {
                echo '<option value="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</option>';
            }
        endforeach;
        echo '</select></div>';
        wp_reset_postdata(); endif; ?>

        <!-- 美容外科 -->
        <?php
        $custom_posts = get_posts(array(
        'post_type' => 'price',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
            'taxonomy' => 'price-cat',
            'field' => 'slug',
            'terms' => 'surgery',
            'operator' => 'IN'
            ),
            )
        ));
        global $post;
        if($custom_posts):
        echo '<p class="el_priceSide_ttl">美容外科</p><div class="el_sideSelect" ><select name="surgery" onchange="location.href=value;"><option value="" selected="" disabled="">施術を選ぶ</option>';
        $current_post_title = get_the_title();
        $current_post_url = get_permalink();
        $matched = false;
        foreach($custom_posts as $post):
            setup_postdata($post);
            if ($current_post_title === get_the_title()) {
                $matched = true;
                echo '<option value="' . esc_url($current_post_url) . '" selected>' . esc_html($current_post_title) . '</option>';
            }
        endforeach;
        foreach($custom_posts as $post):
            setup_postdata($post);
            if ($current_post_title !== get_the_title()) {
                echo '<option value="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</option>';
            }
        endforeach;
        echo '</select></div>';
        wp_reset_postdata(); endif; ?>

        <!-- ドクターズコスメ -->
        <?php
        $custom_posts = get_posts(array(
        'post_type' => 'price',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
            'taxonomy' => 'price-cat',
            'field' => 'slug',
            'terms' => 'cosme',
            'operator' => 'IN'
            ),
            )
        ));
        global $post;
        if($custom_posts):
        echo '<p class="el_priceSide_ttl">ドクターズコスメ</p><div class="el_sideSelect" ><select name="cosme" onchange="location.href=value;"><option value="" selected="" disabled="">施術を選ぶ</option>';
        $current_post_title = get_the_title();
        $current_post_url = get_permalink();
        $matched = false;
        foreach($custom_posts as $post):
            setup_postdata($post);
            if ($current_post_title === get_the_title()) {
                $matched = true;
                echo '<option value="' . esc_url($current_post_url) . '" selected>' . esc_html($current_post_title) . '</option>';
            }
        endforeach;
        foreach($custom_posts as $post):
            setup_postdata($post);
            if ($current_post_title !== get_the_title()) {
                echo '<option value="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</option>';
            }
        endforeach;
        echo '</select></div>';
        wp_reset_postdata(); endif; ?>

        <!-- サプリ内服 -->
        <?php
        $custom_posts = get_posts(array(
        'post_type' => 'price',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
            'taxonomy' => 'price-cat',
            'field' => 'slug',
            'terms' => 'supplement',
            'operator' => 'IN'
            ),
            )
        ));
        global $post;
        if($custom_posts):
        echo '<p class="el_priceSide_ttl">サプリ内服</p><div class="el_sideSelect" ><select name="supplement" onchange="location.href=value;"><option value="" selected="" disabled="">施術を選ぶ</option>';
        $current_post_title = get_the_title();
        $current_post_url = get_permalink();
        $matched = false;
        foreach($custom_posts as $post):
            setup_postdata($post);
            if ($current_post_title === get_the_title()) {
                $matched = true;
                echo '<option value="' . esc_url($current_post_url) . '" selected>' . esc_html($current_post_title) . '</option>';
            }
        endforeach;
        foreach($custom_posts as $post):
            setup_postdata($post);
            if ($current_post_title !== get_the_title()) {
                echo '<option value="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</option>';
            }
        endforeach;
        echo '</select></div>';
        wp_reset_postdata(); endif; ?>
        
    </div><!-- /el_priceSide -->
</div><!-- /ly_2col -->

</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

</body>
</html>
