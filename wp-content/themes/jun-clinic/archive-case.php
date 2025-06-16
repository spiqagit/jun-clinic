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

        <div class="ly_caseSec">
            <div class="bl_caseSec_inner">
                <div class="bl_caseSideMenuContainer">
                    <div class="bl_priceSec_seideMenuContainer_list">
                        <?php
                        $args = array(
                            'post_type' => 'case',
                            'posts_per_page' => -1,
                            'fields' => 'ids',
                            'meta_query ' => array(
                                array(
                                    'key' => 'menu_select',
                                    'compare' => 'EXISTS',
                                ),
                            ),
                            'orderby' => 'meta_value',
                            'order' => 'ASC',
                        );

                        $menuIdList = array();
                        $menuQuery = new WP_Query($args);

                        if ($menuQuery->have_posts()) {
                            while ($menuQuery->have_posts()) {
                                $menuQuery->the_post();
                                $menuIdList = array_merge($menuIdList, get_field('menu_select'));
                            }
                        }
                        $menuIdList = array_unique($menuIdList);
                        ?>

                        <?php
                        $surgeryQuery = new WP_Query(array(
                            'post_type' => 'menu',
                            'posts_per_page' => -1,
                            'post__in' => array_map('intval', $menuIdList), // IDを整数に変換
                            'orderby' => 'post__in',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'menu-cat',
                                    'field' => 'slug',
                                    'terms' => 'surgery',
                                    'include_children' => false,
                                ),
                            ),
                        ));
                        ?>
                        <div class="bl_priceSec_seideMenuContainer_item">
                            <p class="el_priceSec_seideMenuContainer_item_ttl">美容皮膚科</p>
                            <div class="bl_priceSec_seideMenuContainer_item_selectContainer">
                                <select name="menu-cat" id="menu-cat-select" onchange="if(this.value) window.location.href=this.value" class="bl_priceSec_seideMenuContainer_item_select">
                                    <option value="" class="el_priceSec_seideMenuContainer_item_select_first">施術を選ぶ</option>
                                    <?php if ($surgeryQuery->have_posts()) : ?>
                                        <?php while ($surgeryQuery->have_posts()) : $surgeryQuery->the_post(); ?>
                                            <option value="<?php echo home_url(); ?>/search-case/?s=<?php the_id(); ?>"><?php the_title(); ?></option>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <?php
                        //皮膚科
                        $dermatologyQuery = new WP_Query(array(
                            'post_type' => 'menu',
                            'posts_per_page' => -1,
                            'post__in' => array_map('intval', $menuIdList), // IDを整数に変換
                            'orderby' => 'post__in',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'menu-cat',
                                    'field' => 'slug',
                                    'terms' => 'dermatology',
                                    'include_children' => false,
                                ),
                            ),
                        ));
                        ?>
                        <div class="bl_priceSec_seideMenuContainer_item">
                            <p class="el_priceSec_seideMenuContainer_item_ttl">美容外科</p>
                            <div class="bl_priceSec_seideMenuContainer_item_selectContainer">
                                <select name="menu-cat" id="menu-cat-select" onchange="if(this.value) window.location.href=this.value" class="bl_priceSec_seideMenuContainer_item_select">
                                    <option value="" class="el_priceSec_seideMenuContainer_item_select_first">施術を選ぶ</option>
                                    <?php if ($dermatologyQuery->have_posts()) : ?>
                                        <?php while ($dermatologyQuery->have_posts()) : $dermatologyQuery->the_post(); ?>
                                            <option value="<?php echo home_url(); ?>/search-case/?s=<?php the_id(); ?>"><?php the_title(); ?></option>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <p class="el_caseSideMenuContainer_txt">※料金はすべて税込価格です。</p>
                </div>
                <?php
                $args = array(
                    'post_type' => 'case',
                    'posts_per_page' => 9,
                    'orderby' => 'date',
                    'order' => 'DESC',
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

                <?php
                global $wp_query;

                $big = 999999999; // need an unlikely integer

                $pagination_links = paginate_links(array(
                    'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format'    => '?paged=%#%',
                    'current'   => max(1, get_query_var('paged')),
                    'total'     => $wp_query->max_num_pages,
                    'prev_text' => '',
                    'next_text' => '',
                    'type'      => 'array',
                    'end_size'  => 2,
                    'mid_size'  => 1,
                ));
                ?>
                <?php if (is_array($pagination_links)) : ?>
                    <div class="bl_commonPaginationContainer">
                        <?php
                        $current_page = max(1, get_query_var('paged'));
                        $prev_page = $current_page - 1;
                        $next_page = $current_page + 1;
                        ?>

                        <?php if ($current_page > 1) : ?>
                            <a href="<?php echo esc_url(get_pagenum_link($prev_page)); ?>" class="bl_commonPaginationContainer_btn pagination__item--prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" fill="none">
                                    <path d="M6.30371 0.706975C6.01082 0.414081 5.53508 0.414081 5.24219 0.706975L0.469727 5.48041C0.176833 5.77331 0.176833 6.24807 0.469727 6.54096L5.24219 11.3144C5.53508 11.6073 6.01082 11.6073 6.30371 11.3144C6.5966 11.0215 6.5966 10.5458 6.30371 10.2529L2.81055 6.76069H17C17.4142 6.76069 17.75 6.4249 17.75 6.01069C17.75 5.59647 17.4142 5.26069 17 5.26069H2.81055L6.30371 1.7685C6.5966 1.4756 6.5966 0.999868 6.30371 0.706975Z" fill="white"></path>
                                </svg>
                            </a>
                        <?php else: ?>
                            <div></div>
                        <?php endif; ?>

                        <ul class="bl_commonPaginationContainer_list">
                            <?php foreach ($pagination_links as $link) : ?>
                                <?php if (strpos($link, 'prev') === false && strpos($link, 'next') === false) : ?>
                                    <?php $link = str_replace('…', '・・・', $link); ?>
                                    <li class="bl_commonPaginationContainer_list_item"><?php echo $link; ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>

                        <?php if ($current_page < $wp_query->max_num_pages) : ?>
                            <a href="<?php echo esc_url(get_pagenum_link($next_page)); ?>" class="bl_commonPaginationContainer_btn pagination__item--next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" fill="none">
                                    <path d="M11.6963 0.706975C11.9892 0.414081 12.4649 0.414081 12.7578 0.706975L17.5303 5.48041C17.8232 5.77331 17.8232 6.24807 17.5303 6.54096L12.7578 11.3144C12.4649 11.6073 11.9892 11.6073 11.6963 11.3144C11.4034 11.0215 11.4034 10.5458 11.6963 10.2529L15.1895 6.76069H1C0.585786 6.76069 0.25 6.4249 0.25 6.01069C0.25 5.59647 0.585786 5.26069 1 5.26069H15.1895L11.6963 1.7685C11.4034 1.4756 11.4034 0.999868 11.6963 0.706975Z" fill="white"></path>
                                </svg>
                            </a>
                        <?php else: ?>
                            <div></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
    </main>

    <?php get_footer(); ?>

</body>

</html>