<!-- view head -->
<header class="ly_header">
    <div class="ly_header_inner">

        <div class="el_head_logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo_head.svg" alt="ロゴ">
            </a>
        </div>
        <div class="ly_head_nav">
            <div class="el_tel">
                <a href="tel:<?php echo get_field('tel', 'option'); ?>">
                    <span class="el_tel_num"><?php echo get_field('tel', 'option'); ?></span>
                    <span class="el_tel_text">受付時間 <?php echo get_field('reception_hours', 'option'); ?></span>
                </a>
            </div>
            <ul class="el_reserveList">
                <li><a href="<?php echo get_field('url_line', 'option'); ?>" target="_blank">
                    <span class="el_text">LINE予約</span>
                </a></li>
                <li><a href="<?php echo get_field('url_web', 'option'); ?>" target="_blank">
                    <span class="el_text">WEB予約</span>
                </a></li>
            </ul>
        </div>
        
    </div>
</header>
<div class="el_burger_btn js_burger"></div>
<!-- /view head --> 

<!-- burger menu -->
<div class="ly_burger js_burger_item">
    <div class="ly_burger_wrap">
        <div class="ly_burger_side">
            <div class="bl_burger_inner">
                <figure class="el_logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo_burger.svg" alt="ロゴ"></figure>
                <div class="bl_burger_contact">
                    <div class="el_tel un_pc">
                        <a href="tel:<?php echo get_field('tel', 'option'); ?>">
                            <span class="el_tel_num"><?php echo get_field('tel', 'option'); ?></span>
                            <span class="el_tel_text">受付時間 <?php echo get_field('reception_hours', 'option'); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /ly_burger_side -->

        <div class="ly_burger_main">
            <div class="bl_burger_inner">
                <ul class="el_burgerList">
                    <li><a href="<?php echo home_url(); ?>">
                        <span class="el_burgerList_ja">トップ</span>
                    </a></li>
                    <li><a href="<?php echo home_url(); ?>/about/">
                        <span class="el_burgerList_ja">クリニックについて</span>
                    </a></li>
                    <li><a href="<?php echo home_url(); ?>/doctor/">
                        <span class="el_burgerList_ja">医師紹介</span>
                    </a></li>
                    <li><a href="<?php echo home_url(); ?>/menu/">
                        <span class="el_burgerList_ja">施術メニュー</span>
                    </a></li>
                    <li><a href="<?php echo home_url(); ?>/case/">
                        <span class="el_burgerList_ja">症例</span>
                    </a></li>
                    <li><a href="<?php echo home_url(); ?>/price/">
                        <span class="el_burgerList_ja">料金表</span>
                    </a></li>
                    <li><a href="<?php echo home_url(); ?>/access/">
                        <span class="el_burgerList_ja">アクセス</span>
                    </a></li>
                    <li><a href="<?php echo home_url(); ?>/faq/">
                        <span class="el_burgerList_ja">よくある質問</span>
                    </a></li>
                    <li><a href="<?php echo home_url(); ?>/column/">
                        <span class="el_burgerList_ja">コラム</span>
                    </a></li>
                    <li><a href="<?php echo home_url(); ?>/news/">
                        <span class="el_burgerList_ja">お知らせ</span>
                    </a></li>
                </ul>
                <div class="el_burger_sns">
                    <p class="el_text">Official SNS</p>
                    <?php include(TEMPLATEPATH . '/assets/include/list_sns.php'); ?>
                </div>
            </div>
        </div><!-- /ly_burger_main -->


    </div><!-- /ly_burger_wrap -->
</div>

<!-- /burger menu -->