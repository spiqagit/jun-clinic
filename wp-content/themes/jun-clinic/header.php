<header class="ly_header">
    <div class="ly_header_conatiner">
        <div class="ly_header_inner">
            <h1 class="bl_header_inner_logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/jun-clinic.svg" alt="JUN CLINIC">
            </h1>
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

    <?php if (get_field('url_line', 'option')): ?>
        <a href="<?php the_field('url_line'); ?>" target="_blank" class="bl_header_menu_lineReserveBtn">LINE予約</a>
    <?php endif; ?>

    <nav class="bl_header_nav">
        <img class="bl_header_nav_bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/bg.png" alt="">

        <div class="bl_header_nav_inner">
            <div class="bl_header_nav_inner_ctaContainer">
                <div class="bl_header_nav_inner_ctaContainer_inner">
                    <div class="bl_header_nav_inner_ctaContainer_inner_logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/jun-clinic-white.svg" alt="JUN CLINIC">
                    </div>

                    <?php if (get_field('url_line', 'option')): ?>
                        <div class="bl_header_nav_inner_ctaContainer_inner_lineReserveBtn">
                            <a href="<?php the_field('url_line'); ?>" target="_blank" class="bl_commonlineReserveBtn">LINE予約</a>
                        </div>
                    <?php endif; ?>

                    <?php
                    $banner_img = get_field('banner-img', 'option');
                    ?>
                    <?php if ($banner_img): ?>
                        <?php if (get_field('banner-link', 'option')): ?>
                            <a class="bl_header_nav_inner_ctaContainer_inner_banner bl_header_nav_inner_ctaContainer_inner_banner_link" href="<?php the_field('banner-link'); ?>" target="_blank">
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
                                <a class="bl_globalNaviList_item_link" href="#">
                                    <p class="el_globalNaviList_item_link_text">トップ</p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/line-arrow.svg" alt="">
                                </a>
                            </li>
                            <li class="bl_globalNaviList_item">
                                <a class="bl_globalNaviList_item_link" href="#">
                                    <p class="el_globalNaviList_item_link_text">トップ</p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/line-arrow.svg" alt="">
                                </a>
                            </li>
                            <li class="bl_globalNaviList_item">
                                <a class="bl_globalNaviList_item_link" href="#">
                                    <p class="el_globalNaviList_item_link_text">トップ</p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/line-arrow.svg" alt="">
                                </a>
                            </li>
                            <li class="bl_globalNaviList_item">
                                <a class="bl_globalNaviList_item_link" href="#">
                                    <p class="el_globalNaviList_item_link_text">トップ</p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/line-arrow.svg" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bl_header_nav_inner_menu_conatainer">
                    <div class="bl_header_nav_inner_menu_conatainer_titleWrapper">
                        <p class="bl_header_nav_inner_menu_conatainer_title">お悩みから探す</p>
                    </div>
                    <div class="bl_header_nav_inner_menu_conatainer_listWrapper">
                        <ul class="bl_globalMenuList">
                            <li class="bl_globalMenuList_item">
                                <a class="bl_globalMenuList_item_link" href="#">
                                    <p class="el_globalMenuList_item_link_text">目の下のくま・たるみ</p>
                                </a>
                            </li>
                            <li class="bl_globalMenuList_item">
                                <a class="bl_globalMenuList_item_link" href="#">
                                    <p class="el_globalMenuList_item_link_text">目の下のくま・たるみ</p>
                                </a>
                            </li>
                            <li class="bl_globalMenuList_item">
                                <a class="bl_globalMenuList_item_link" href="#">
                                    <p class="el_globalMenuList_item_link_text">目の下のくま・たるみ</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bl_header_nav_inner_menu_conatainer">
                    <div class="bl_header_nav_inner_menu_conatainer_titleWrapper">
                        <p class="bl_header_nav_inner_menu_conatainer_title">美容皮膚科</p>
                    </div>
                    <div class="bl_header_nav_inner_menu_conatainer_listWrapper">
                        <ul class="bl_globalMenuList">
                            <li class="bl_globalMenuList_item">
                                <a class="bl_globalMenuList_item_link" href="#">
                                    <p class="el_globalMenuList_item_link_text">カスタマイズレーザー治療</p>
                                </a>
                            </li>
                            <li class="bl_globalMenuList_item">
                                <a class="bl_globalMenuList_item_link" href="#">
                                    <p class="el_globalMenuList_item_link_text">カスタマイズレーザー治療</p>
                                </a>
                            </li>
                            <li class="bl_globalMenuList_item">
                                <a class="bl_globalMenuList_item_link" href="#">
                                    <p class="el_globalMenuList_item_link_text">カスタマイズレーザー治療</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bl_header_nav_inner_menu_conatainer">
                    <div class="bl_header_nav_inner_menu_conatainer_titleWrapper">
                        <p class="bl_header_nav_inner_menu_conatainer_title">美容外科</p>
                    </div>
                    <div class="bl_header_nav_inner_menu_conatainer_listWrapper">
                        <ul class="bl_globalMenuList">
                            <li class="bl_globalMenuList_item">
                                <a class="bl_globalMenuList_item_link" href="#">
                                    <p class="el_globalMenuList_item_link_text">埋没</p>
                                </a>
                            </li>
                            <li class="bl_globalMenuList_item">
                                <a class="bl_globalMenuList_item_link" href="#">
                                    <p class="el_globalMenuList_item_link_text">全切開</p>
                                </a>
                            </li>
                            <li class="bl_globalMenuList_item">
                                <a class="bl_globalMenuList_item_link" href="#">
                                    <p class="el_globalMenuList_item_link_text">経結膜脱脂</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </nav>
</header>