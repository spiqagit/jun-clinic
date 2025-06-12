<header class="ly_header">
    <div class="ly_header_conatiner">
        <div class="ly_header_inner">

            <?php if (is_front_page()): ?>
                <h1 class="bl_header_inner_logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/jun-clinic.svg" alt="JUN CLINIC">
                </h1>
            <?php else: ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="bl_header_inner_logo bl_header_inner_logo_link" rel="home">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/jun-clinic.svg" alt="JUN CLINIC">
                </a>
            <?php endif; ?>

        </div>
    </div>

    <div class="bl_header_menu">
        <button class="el_header_menu_btn" id="headerMenuBtn" type="button">
            <span class="bl_header_menu_btn_lineContainer">
                <span class="el_header_menu_btn_lineContainer_line"></span>
                <span class="el_header_menu_btn_lineContainer_line"></span>
            </span>
        </button>
    </div>

    <button class="bl_header_menu_lineReserveBtn" type="button" id="menuLineReserveBtn">LINE予約</button>

    <div class="bl_lineReserveModal bl_header_menu_lineReserve_modal" id="menuLineReserveModal">
        <div class="bl_lineReserveModal_inner">
            <button type="button" class="el_lineReserveModal_inner_closeBtn">
                <img class="el_lineReserveModal_inner_closeBtn_icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/close-icon.svg" alt="">
            </button>
            <p class="el_lineReserveModal_inner_title">予約する</p>
            <?php
            $arg = array(
                'post_type' => 'clinic',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($arg);
            ?>
            <?php if ($query->have_posts()) : ?>
                <!-- <ul class="bl_lineReserveModal_inner_list">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li class="bl_lineReserveModal_inner_list_item">
                            <a href="<?php the_field('line_reserveUrl'); ?>" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                                <p class="el_lineReserveModal_inner_list_item_link_txt"><?php
                                                                                        $term = get_term(get_field('news_topics_place'), 'clinic-cat');
                                                                                        if (!is_wp_error($term)) {
                                                                                            echo $term->name;
                                                                                        }
                                                                                        ?></p>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul> -->
            <?php endif; ?>
            <ul class="bl_lineReserveModal_inner_list">
                <li class="bl_lineReserveModal_inner_list_item">
                    <a href="https://lin.ee/b5aPOxd" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                        <p class="el_lineReserveModal_inner_list_item_link_txt">名古屋</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                    </a>
                </li>
                <li class="bl_lineReserveModal_inner_list_item">
                    <a href="https://lin.ee/W51cKOH" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                        <p class="el_lineReserveModal_inner_list_item_link_txt">たまプラーザ</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                    </a>
                </li>
                <li class="bl_lineReserveModal_inner_list_item">
                    <a href="https://lin.ee/7a5AEGn" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                        <p class="el_lineReserveModal_inner_list_item_link_txt">銀座</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                    </a>
                </li>
                <li class="bl_lineReserveModal_inner_list_item">
                    <a href="https://lin.ee/ypb1QiP" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                        <p class="el_lineReserveModal_inner_list_item_link_txt">横浜</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                    </a>
                </li>
                <li class="bl_lineReserveModal_inner_list_item">
                    <a href="https://lin.ee/V73rJy1" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                        <p class="el_lineReserveModal_inner_list_item_link_txt">白金</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                    </a>
                </li>
                <li class="bl_lineReserveModal_inner_list_item">
                    <a href="https://lin.ee/2HvFUZu" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                        <p class="el_lineReserveModal_inner_list_item_link_txt">長野</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <nav class="bl_header_nav">

        <div class="bl_header_nav_inner">
            <div class="bl_header_nav_inner_ctaContainer">
                <div class="bl_header_nav_inner_ctaContainer_inner">
                    <div class="bl_header_nav_inner_ctaContainer_inner_logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/jun-clinic-white.svg" alt="JUN CLINIC">
                    </div>


                    <div class="bl_header_nav_inner_ctaContainer_inner_lineReserveBtn">
                        <button type="button" class="bl_commonlineReserveBtn" id="naviLineReserveBtn">LINE予約</button>

                        <div class="bl_lineReserveModal bl_header_lineReserve_modal" id="naviLineReserveModal">
                            <div class="bl_lineReserveModal_inner">
                                <button type="button" class="el_lineReserveModal_inner_closeBtn">
                                    <img class="el_lineReserveModal_inner_closeBtn_icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/close-icon.svg" alt="">
                                </button>
                                <p class="el_lineReserveModal_inner_title">予約する</p>
                                <?php
                                $arg = array(
                                    'post_type' => 'clinic',
                                    'posts_per_page' => -1,
                                );
                                $query = new WP_Query($arg);
                                ?>
                                <?php if ($query->have_posts()) : ?>
                                    <!-- <ul class="bl_lineReserveModal_inner_list">
                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                            <li class="bl_lineReserveModal_inner_list_item">
                                                <a href="<?php the_field('line_reserveUrl'); ?>" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                                                    <p class="el_lineReserveModal_inner_list_item_link_txt"><?php
                                                                                                            $term = get_term(get_field('news_topics_place'), 'clinic-cat');
                                                                                                            if (!is_wp_error($term)) {
                                                                                                                echo $term->name;
                                                                                                            }
                                                                                                            ?></p>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                                                </a>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul> -->
                                <?php endif; ?>
                                <ul class="bl_lineReserveModal_inner_list">
                                    <li class="bl_lineReserveModal_inner_list_item">
                                        <a href="https://lin.ee/b5aPOxd" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                                            <p class="el_lineReserveModal_inner_list_item_link_txt">名古屋</p>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                                        </a>
                                    </li>
                                    <li class="bl_lineReserveModal_inner_list_item">
                                        <a href="https://lin.ee/W51cKOH" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                                            <p class="el_lineReserveModal_inner_list_item_link_txt">たまプラーザ</p>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                                        </a>
                                    </li>
                                    <li class="bl_lineReserveModal_inner_list_item">
                                        <a href="https://lin.ee/7a5AEGn" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                                            <p class="el_lineReserveModal_inner_list_item_link_txt">銀座</p>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                                        </a>
                                    </li>
                                    <li class="bl_lineReserveModal_inner_list_item">
                                        <a href="https://lin.ee/ypb1QiP" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                                            <p class="el_lineReserveModal_inner_list_item_link_txt">横浜</p>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                                        </a>
                                    </li>
                                    <li class="bl_lineReserveModal_inner_list_item">
                                        <a href="https://lin.ee/V73rJy1" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                                            <p class="el_lineReserveModal_inner_list_item_link_txt">白金</p>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                                        </a>
                                    </li>
                                    <li class="bl_lineReserveModal_inner_list_item">
                                        <a href="https://lin.ee/2HvFUZu" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                                            <p class="el_lineReserveModal_inner_list_item_link_txt">長野</p>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <?php
                    $banner_img = get_field('header-banner-img', 'option');
                    ?>
                    <?php if ($banner_img): ?>
                        <?php if (get_field('header-banner-link', 'option')): ?>
                            <a class="bl_header_nav_inner_ctaContainer_inner_banner bl_header_nav_inner_ctaContainer_inner_banner_link" href="<?php the_field('header-banner-link', 'option'); ?>" target="_blank">
                                <img src="<?php echo $banner_img['url']; ?>" alt="<?php echo $banner_img['alt']; ?>">
                            </a>
                        <?php else: ?>
                            <div class="bl_header_nav_inner_ctaContainer_inner_banner">
                                <img src="<?php echo $banner_img['url']; ?>" alt="<?php echo $banner_img['alt']; ?>">
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="bl_header_nav_inner_menu">
                <div class="bl_header_nav_inner_menu_conatainer">
                    <div class="bl_header_nav_inner_menu_conatainer_listWrapper">
                        <ul class="bl_globalNaviList">
                            <li class="bl_globalNaviList_item">
                                <a class="bl_globalNaviList_item_link" href="<?php echo esc_url(home_url('/')); ?>">
                                    <p class="el_globalNaviList_item_link_text">トップ</p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/line-arrow.svg" alt="">
                                </a>
                            </li>
                            <li class="bl_globalNaviList_item">
                                <a class="bl_globalNaviList_item_link" href="<?php echo  esc_url(home_url('/price/')); ?>">
                                    <p class="el_globalNaviList_item_link_text">料金表</p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/line-arrow.svg" alt="">
                                </a>
                            </li>
                            <li class="bl_globalNaviList_item">
                                <a class="bl_globalNaviList_item_link" href="<?php echo  esc_url(home_url('/doctor/')); ?>">
                                    <p class="el_globalNaviList_item_link_text">ドクター一覧</p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/line-arrow.svg" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


                <!-- お悩みから探す -->
                <div class="bl_header_nav_inner_menu_conatainer">
                    <div class="bl_header_nav_inner_menu_conatainer_titleWrapper">
                        <p class="bl_header_nav_inner_menu_conatainer_title">お悩みから探す</p>
                    </div>
                    <div class="bl_header_nav_inner_menu_conatainer_listWrapper">
                        <?php
                        $problemFlag = false;
                        if ($problemFlag) :
                        ?>
                            <ul class="bl_globalMenuList">
                                <?php
                                $terms = get_terms(array(
                                    'taxonomy' => 'menu-problem',
                                    'hide_empty' => true,
                                ));
                                if (!empty($terms) && !is_wp_error($terms)) :
                                    foreach ($terms as $term) : ?>
                                        <li class="bl_globalMenuList_item">
                                            <a class="bl_globalMenuList_item_link" href="<?php echo esc_url(get_term_link($term)); ?>">
                                                <p class="el_globalMenuList_item_link_text"><?php echo esc_html($term->name); ?></p>
                                            </a>
                                        </li>
                                <?php endforeach;
                                endif; ?>
                            </ul>
                        <?php else: ?>
                            <div class="bl_commonComingSoonTxtContainer">
                                <p class="el_commonComingSoonTxt">coming soon</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php
                $menuCatList = get_terms(array(
                    'taxonomy' => 'menu-cat',
                    'parent' => 0,  // 親カテゴリーのみ
                    'hide_empty' => true  // 投稿がないものは除外
                ));
                $termList = array();

                foreach ($menuCatList as $menuCat) {

                    $posts = get_posts(array(
                        'post_type' => 'menu',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'menu-cat',
                                'field' => 'term_id',
                                'terms' => $menuCat->term_id
                            )
                        )
                    ));

                    if (!empty($posts)) {
                        $termList[] = $menuCat;
                    }
                }
                ?>
                <?php foreach ($termList as $term): ?>

                    <div class="bl_header_nav_inner_menu_conatainer">
                        <div class="bl_header_nav_inner_menu_conatainer_titleWrapper">
                            <p class="bl_header_nav_inner_menu_conatainer_title"><?php echo $term->name; ?></p>
                        </div>
                        <div class="bl_header_nav_inner_menu_conatainer_listWrapper">
                            <?php
                            // サブクエリで記事を取得
                            $args = array(
                                'post_type' => 'menu',
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'menu-cat',
                                        'field' => 'term_id',
                                        'terms' => $term->term_id
                                    )
                                ),
                                'orderby' => 'menu_order',
                                'order' => 'ASC'
                            );

                            $sub_query = new WP_Query($args);
                            ?>
                            <?php if ($sub_query->have_posts()) : ?>
                                <ul class="bl_globalMenuList">

                                    <?php while ($sub_query->have_posts()) : $sub_query->the_post(); ?>
                                        <li class="bl_globalMenuList_item">
                                            <a class="bl_globalMenuList_item_link" href="<?php the_permalink(); ?>">
                                                <p class="el_globalMenuList_item_link_text"><?php the_title(); ?></p>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                </ul>
                            <?php endif; ?>

                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </nav>
</header>