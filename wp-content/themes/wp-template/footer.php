<?php if (!is_front_page()): ?>
<ol class="el_breadcrumbs">
    <li><a href="<?php echo home_url(); ?>">TOP</a></li>
    <?php if (is_post_type_archive('news')) : ?>
        <li>NEWS</li>
    <?php elseif (is_singular('news')) : ?>
        <li><a href="<?php echo home_url(); ?>/news/">NEWS</a></li>
        <li><?php the_title(); ?></li>
    <?php elseif (is_post_type_archive('case')) : ?>
        <li>CASE</li>
    <?php elseif (is_singular('case')) : ?>
        <li><a href="<?php echo home_url(); ?>/case/">CASE</a></li>
        <li><?php the_title(); ?></li>
    <?php elseif (is_post_type_archive('price')) : ?>
        <li>PRICE</li>
    <?php elseif (is_singular('price')) : ?>
        <li><a href="<?php echo home_url(); ?>/price/">PRICE</a></li>
        <li><?php the_title(); ?></li>
    <?php elseif (is_post_type_archive('column')) : ?>
        <li>COLUMN</li>
    <?php elseif (is_singular('column')) : ?>
        <li><a href="<?php echo home_url(); ?>/column/">COLUMN</a></li>
        <li><?php the_title(); ?></li>
    <?php elseif (is_post_type_archive('menu')) : ?>
        <li>MENU</li>
    <?php elseif (is_singular('menu')) : ?>
        <li><a href="<?php echo home_url(); ?>/menu/">MENU</a></li>
        <li><?php the_title(); ?></li>
    <?php elseif (is_post_type_archive('doctor')) : ?>
        <li>DOCTOR</li>
    <?php elseif (is_post_type_archive('faq')) : ?>
        <li>FAQ</li>
    <?php else: ?>
        <li><?php the_title(); ?></li>
    <?php endif; ?>
</ol>
<?php endif; ?>

<footer class="ly_footer">
<div class="el_footReserve">
    <div class="el_footReserve_inner">
        <div class="el_tel">
            <a href="tel:<?php echo get_field('tel', 'option'); ?>">
                <span class="el_tel_num"><?php echo get_field('tel', 'option'); ?></span>
                <span class="el_tel_text">受付時間 <?php echo get_field('reception_hours', 'option'); ?></span>
            </a>
        </div>
        <ul class="el_btnList_foot">
            <li><a href="<?php echo get_field('url_line', 'option'); ?>" target="_blank">
                <span class="el_text">LINE予約</span>
            </a></li>
            <li><a href="<?php echo get_field('url_web', 'option'); ?>" target="_blank">
                <span class="el_text">WEB予約</span>
            </a></li>
        </ul>
    </div>
</div><!-- /el_footReserve -->

<?php if (!is_page('access')): ?>
<div class="el_footAccess">
    <div class="ly_inner">
        <div class="el_footAccess_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.9206345906355!2d139.70460251094093!3d35.65432697248164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188ba2c4a96b05%3A0x448eae9e93b5d1cb!2z5qCq5byP5Lya56S-44K544OU44Kr44OH44K244Kk44Oz77yIU1BJUUEgREVTSUdOIEluYy4p!5e0!3m2!1sja!2sjp!4v1729758909497!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <a href="https://maps.app.goo.gl/vTNBxGSfSWg9zVin6" target="_blank" class="el_link_blank">Google Mapsはこちら</a>
        </div><!-- /el_footAccess_map -->
        <div class="el_footAccess_text">
            <figure class="el_access_logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo_access.svg" alt="ロゴ">
            </figure>
            <p class="el_text">〒000-0000<br>
            東京都渋谷区1-1-1<br>テストビル1F</p>
        </div>
    </div>
</div><!-- /el_footAccess -->
<?php endif; ?>

<div class="el_footMenu">
    <div class="ly_inner">
        <div class="el_footMenu_wrap">
            <p class="el_footMenu_ttl js_acc_ttl">美容皮膚科</p>
            <ul class="el_footMenu_list">
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
        </div><!-- /el_footMenu_wrap 美容皮膚科 -->
        <div class="el_footMenu_wrap">
            <p class="el_footMenu_ttl js_acc_ttl">美容外科</p>
            <ul class="el_footMenu_list">
            <?php
            $custom_posts = get_posts(array(
            'post_type' => 'menu',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                'taxonomy' => 'menu-cat',
                'field' => 'slug',
                'terms' => 'surgery',
                'operator' => 'IN'
                ),
                )
            ));
            global $post;
            if($custom_posts): foreach($custom_posts as $post): setup_postdata($post); ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endforeach; wp_reset_postdata(); endif; ?>
            </ul>
        </div><!-- /el_footMenu_wrap 美容外科 -->
    </div>
</div><!-- /el_footMenu -->

<div class="el_footLinks">
    <div class="ly_inner">
        <div class="el_footLinks_wrap">
            <ul class="el_footLinks_list">
                <li><a href="<?php echo home_url(); ?>">トップ</a></li>
                <li><a href="<?php echo home_url(); ?>/about/">クリニックについて</a></li>
                <li><a href="<?php echo home_url(); ?>/doctor/">医師紹介</a></li>
                <li><a href="<?php echo home_url(); ?>/menu/">施術メニュー</a></li>
                <li><a href="<?php echo home_url(); ?>/case/">症例</a></li>
                <li><a href="<?php echo home_url(); ?>/price/">料金表</a></li>
                <li><a href="<?php echo home_url(); ?>/access/">アクセス</a></li>
                <li><a href="<?php echo home_url(); ?>/faq/">よくある質問</a></li>
                <li><a href="<?php echo home_url(); ?>/column/">コラム</a></li>
                <li><a href="<?php echo home_url(); ?>/news/">お知らせ</a></li>
            </ul>
            <div class="el_footLinks_bottom">
                <ul class="el_footLinks_list">
                    <li><a href="<?php echo home_url(); ?>/privacy-policy/">プライバシーポリシー</a></li>
                    <li><a href="<?php echo home_url(); ?>/commerce/">特定商取引法に基づく表記</a></li>
                </ul>
                <p class="el_footLinks_copy">&copy; test CLINIC</p>
            </div>
        </div>
    </div>
</div><!-- /el_footLinks -->


</footer>

<div class="el_flowArea un_sp">
    <div class="el_flowArea_inner">
        <a class="el_tel" href="tel:<?php echo get_field('tel', 'option'); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M16.95 18C14.8667 18 12.8083 17.546 10.775 16.638C8.74167 15.73 6.89167 14.4423 5.225 12.775C3.55833 11.1077 2.271 9.25767 1.363 7.225C0.455 5.19233 0.000666667 3.134 0 1.05C0 0.75 0.0999999 0.5 0.3 0.3C0.5 0.0999999 0.75 0 1.05 0H5.1C5.33333 0 5.54167 0.0793332 5.725 0.238C5.90833 0.396667 6.01667 0.584 6.05 0.8L6.7 4.3C6.73333 4.56667 6.725 4.79167 6.675 4.975C6.625 5.15833 6.53333 5.31667 6.4 5.45L3.975 7.9C4.30833 8.51667 4.704 9.11233 5.162 9.687C5.62 10.2617 6.12433 10.816 6.675 11.35C7.19167 11.8667 7.73333 12.346 8.3 12.788C8.86667 13.23 9.46667 13.634 10.1 14L12.45 11.65C12.6 11.5 12.796 11.3877 13.038 11.313C13.28 11.2383 13.5173 11.2173 13.75 11.25L17.2 11.95C17.4333 12.0167 17.625 12.1377 17.775 12.313C17.925 12.4883 18 12.684 18 12.9V16.95C18 17.25 17.9 17.5 17.7 17.7C17.5 17.9 17.25 18 16.95 18Z" fill="white"/>
            </svg>
        </a>
        <ul class="el_btnList">
            <li><a href="<?php echo get_field('url_line', 'option'); ?>" target="_blank">
                <span class="el_text">LINE予約</span>
            </a></li>
            <li><a href="<?php echo get_field('url_web', 'option'); ?>" target="_blank">
                <span class="el_text">WEB予約</span>
            </a></li>
        </ul>
    </div>
</div>
