<?php
/*
Template Name: アクセス
*/
?>
<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>
<body class="pg_access">
<?php get_header(); ?>

<main class="ly_main">

<hgroup class="el_pageTtl">
    <h1 class="el_pageTtl_en">ACCESS</h1>
    <p class="el_pageTtl_ja">アクセス</p>
</hgroup><!-- /el_pageTtl -->

<div class="ly_inner ly_access">
    <div class="bl_access_text">
        <p class="el_text">〒000-0000<br>東京都渋谷区1-1-1<br>テストビル1F</p>
    </div><!-- /bl_access_text -->
    <div class="bl_access_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.9206345906355!2d139.70460251094093!3d35.65432697248164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188ba2c4a96b05%3A0x448eae9e93b5d1cb!2z5qCq5byP5Lya56S-44K544OU44Kr44OH44K244Kk44Oz77yIU1BJUUEgREVTSUdOIEluYy4p!5e0!3m2!1sja!2sjp!4v1729758909497!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <a href="https://maps.app.goo.gl/vTNBxGSfSWg9zVin6" target="_blank" class="el_link_blank">Google Mapsはこちら</a>
    </div><!-- /bl_access_map -->
</div><!-- /ly_inner -->

<?php if(have_rows('clinic_slide','option')): ?>
<div class="el_siderInterior">

<div class="js_access_slide">
    <div class="swiper-wrapper">
        <?php while(have_rows('clinic_slide','option')): the_row(); ?>
        <div class="swiper-slide">
            <figure><img src="<?php echo get_sub_field('img'); ?>" alt="" /></figure>
        </div>
        <?php endwhile; ?>
    </div>
</div>

</div><!-- /el_siderInterior -->
<?php endif; ?>


</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/library/swiper-bundle.min.css"/>
<script src="<?php echo get_template_directory_uri(); ?>/assets/library/swiper-bundle.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/access.js"></script>

</body>
</html>
