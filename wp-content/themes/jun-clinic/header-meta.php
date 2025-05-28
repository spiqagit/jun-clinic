<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <!-- キャッシュ対策 -->
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Noto+Sans+JP:wght@100..900&family=Shippori+Mincho:wght@500;600&display=swap" rel="stylesheet">

    <!-- ファビコンなど -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/logo/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="128x128" href="<?php echo get_template_directory_uri(); ?>/assets/img/logo/favicon.png">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/logo/favicon.ico">

    <!-- css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/main.css?<?php echo date_i18n("YmdHis"); ?>" type="text/css" />
    <?php if ((is_post_type_archive('doctor') || is_singular('doctor') || is_singular('clinic'))): ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/common_02.css?<?php echo date_i18n("YmdHis"); ?>" type="text/css" />
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/common.css?<?php echo date_i18n("YmdHis"); ?>" type="text/css" />

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script type="module" src="<?php echo get_template_directory_uri(); ?>/assets/main.js"></script>
    <script type="module" src="<?php echo get_template_directory_uri(); ?>/assets/top.js"></script>