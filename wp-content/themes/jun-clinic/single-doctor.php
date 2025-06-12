<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>

<body class="single_pg_doctor pg_top">
    <div class="bl_commonBgContainer">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/bg.png" alt="">
    </div>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <?php get_header(); ?>

    <main class="ly_main ly_overBg">
        <div class="bl_commonPageTtlContainer">
            <?php get_template_part('inc/breadcrumbs'); ?>
        </div>
        <div class="el_pageTtlPost un_doctor">
            <div class="ly_commonContantsBgItemContainer ly_0uter">
                <!-- profile -->
                <section class="ly_profile">
                    <div class="ly_commonContantsOuter_inner">
                        <div class="bl_profileCnt">
                            <div class="bl_profileCnt_item">
                                <div class="bl_profile_l">
                                    <img class="profile-img" src="<?php the_field('doctor_img'); ?>" alt="<?php the_title(); ?>">
                                    <div class="sns-button-group">
                                        <?php while (have_rows('sns_list')):
                                            the_row();
                                            $sns_type = get_sub_field('type');
                                            $sns_url = get_sub_field('url');
                                            $sns_text = get_sub_field('text');
                                            $sns_class = strtolower($sns_type); // instagram / x / tiktok / youtube
                                        
                                            // アイコン
                                            $sns_icon = '';
                                            switch ($sns_type) {
                                                case 'Instagram':
                                                    $sns_icon = '<img class="icon" src="' . get_template_directory_uri() . '/assets/img/ico/ico_Instagram.svg" alt="Instagram">';
                                                    break;
                                                case 'X':
                                                    $sns_icon = '<img class="icon" src="' . get_template_directory_uri() . '/assets/img/ico/ico_X.svg" alt="X">';
                                                    break;
                                                case 'TikTok':
                                                    $sns_icon = '<img class="icon" src="' . get_template_directory_uri() . '/assets/img/ico/ico_TikTok.svg" alt="TikTok">';
                                                    break;
                                                case 'YouTube':
                                                    $sns_icon = '<img class="icon" src="' . get_template_directory_uri() . '/assets/img/ico/ico_YouTube.svg" alt="YouTube">';
                                                    break;
                                            }
                                            ?>
                                            <a href="<?php echo esc_url($sns_url); ?>"
                                                class="sns-button sns-button--<?php echo esc_attr($sns_class); ?>"
                                                target="_blank" rel="noopener">
                                                <?php echo $sns_icon; ?>
                                                <span><?php echo esc_html($sns_text); ?></span>
                                            </a>
                                        <?php endwhile; ?>

                                    </div>
                                </div>
                                <div class="bl_profile_r bl_articlePage_article">
                                    <?php if (have_rows('doctor_clinic')): ?>
                                        <div class="bl_profile_r_box">
                                        <?php the_row(); // 最初の1行だけ処理 ?>

                                        <?php if (get_sub_field('doctor_clinic__job')): ?>
                                            <p class="el_profile_job">
                                                <?php
                                                $clinic_term = get_sub_field('doctor_clinic__clinic');
                                                if ($clinic_term instanceof WP_Term) {
                                                    echo esc_html($clinic_term->name) . '院';
                                                }
                                                ?>
                                                <?php the_sub_field('doctor_clinic__job'); ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php if (get_sub_field('doctor_clinic__post')): ?>
                                            <p class="el_profile_job_other"><?php the_sub_field('doctor_clinic__post'); ?></p>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <h1 class="el_profile_ttl wp-block-heading"><?php the_title(); ?></h1>

                                    </div>
                                    <div class="el_profile_txt">
                                        <p><?php the_field('profile'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <div class="ly_commonContantsBgItemContainer ly_0uter ly_historyAcademic">
                <div class="ly_historyAcademic_inner">

                    <?php if (have_rows('history')): ?>
                        <section class="ly_history">
                            <div class="bl_topRecommendSec_ttlContainer">
                                <hgroup class="bl_commonSectionTtl bl_topFeatureSec_ttl">
                                    <h2 class="el_commonSectionTtl_ttl_ttl">経歴</h2>
                                </hgroup>
                            </div>
                            <div class="bl_infomationCnt">
                                <dl>
                                    <?php while (have_rows('history')):
                                        the_row(); ?>
                                        <dt><?php the_sub_field('year'); ?>年</dt>
                                        <dd><?php the_sub_field('text'); ?></dd>
                                    <?php endwhile; ?>
                                </dl>
                            </div>
                        </section>
                    <?php endif; ?>
                    <?php if (have_rows('doctor_academic')): ?>
                        <section class="ly_academic">
                            <div class="bl_topRecommendSec_ttlContainer">
                                <hgroup class="bl_commonSectionTtl bl_topFeatureSec_ttl">
                                    <h2 class="el_commonSectionTtl_ttl_ttl">所属学会・備考</h2>
                                </hgroup>
                            </div>
                            <div class="bl_infomationCnt">
                                <ul>
                                    <?php while (have_rows('doctor_academic')):
                                        the_row(); ?>
                                        <li><?php the_sub_field('doctor_academic_txt'); ?></li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </section>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (have_rows('doctor_activities')): ?>
                <div class="ly_commonContantsBgItemContainer ly_0uter ly_activities_box">
                    <section class="ly_activities">
                        <div class="bl_topRecommendSec_ttlContainer">
                            <h2 class="el_commonSectionTtl_ttl_ttl">近年の活動</h2>
                        </div>
                        <div class="bl_accordion">
                            <?php while (have_rows('doctor_activities')):
                                the_row(); ?>
                                <details class="details js-details bl_activitiesCnt_box">
                                    <summary class="details-summary js-details-summary">
                                        <?php the_sub_field('doctor_activities_ttl'); ?><span class="js-icon"></span>
                                    </summary>
                                    <ul class="el_activities_txt wp-block-list details-content js-details-content content">
                                        <li><?php the_sub_field('doctor_activities_month'); ?>月</li>
                                        <li><?php the_sub_field('doctor_activities_txt'); ?></li>
                                    </ul>
                                </details>

                            <?php endwhile; ?>
                        </div>
                        <div class="bl_commonBgContainer_txtContainer_btnContainer">
                            <!-- <a href="#" class="bl_commonBorderRadialArrowBtn">
                                <p class="el_commonBorderRadialArrowBtn_txt">セミナー・学会報告一覧</p>
                                <div class="el_commonBorderRadialArrowBtn_arrowContainer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8">
                                        <path
                                            d="M7.46484 0.464844C7.66011 0.269582 7.97661 0.269582 8.17188 0.464844L11.3535 3.64648C11.5488 3.84175 11.5488 4.15825 11.3535 4.35352L8.17188 7.53516C7.97661 7.73042 7.66011 7.73042 7.46484 7.53516C7.26958 7.33989 7.26958 7.02339 7.46484 6.82813L9.79297 4.5H1C0.723858 4.5 0.5 4.27614 0.5 4C0.5 3.72386 0.723858 3.5 1 3.5H9.79297L7.46484 1.17188C7.26958 0.976613 7.26958 0.660106 7.46484 0.464844Z" />
                                    </svg>
                                </div>
                            </a> -->
                        </div>
                    </section>
                </div>
            <?php endif; ?>
            <div class="ly_commonContantsBgItemContainer ly_0uter">
                <picture class="ly_commonContantsBgItemContainer_item">
                    <source
                        srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-sp.png"
                        media="(max-width: 768px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave.png" alt="">
                </picture>
                <div class="ly_doctor_box">
                    <section class="ly_doctor">
                        <div class="ly_commonContantsOuter_inner">
                            <div class="bl_topRecommendSec_ttlContainer">
                                <hgroup class="bl_commonSectionTtl bl_topFeatureSec_ttl">
                                    <p class="el_commonSectionTtl_ttl">Doctor</p>
                                    <h2 class="el_commonSectionTtl_ttl_ttl">他のドクター</h2>
                                </hgroup>
                            </div>

                        </div>
                        <?php
                        $args = array(
                            'post_type' => 'doctor',
                            'orderby' => 'rand',
                            'posts_per_page' => 6,
                            'post__not_in' => array(get_the_ID()), // 現在表示されているのドクターを除外
                        );
                        $random_doctors = new WP_Query($args);

                        if ($random_doctors->have_posts()):
                            ?>
                            <ul class="bl_doctorList">
                                <?php
                                while ($random_doctors->have_posts()):
                                    $random_doctors->the_post(); ?>
                                    <li class="bl_doctorList_item">
                                        <a href="<?php the_permalink(); ?>" class="bl_doctorList_item_link">
                                            <div class="bl_doctorCard">
                                                <div class="bl_doctorCard_inner">
                                                    <div class="el_doctorCard_img">
                                                        <?php if (get_field('doctor_mini_img')): ?>
                                                            <img src="<?php the_field('doctor_mini_img'); ?>"
                                                                alt="<?php the_title(); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="el_doctorCard_txt">
                                                        <p class="el_doctorCard_txt_job"><?php the_field('job'); ?></p>
                                                        <?php if (get_field('job_other')): ?>
                                                            <p class="el_doctorCard_txt_job_other"><?php the_field('job_other'); ?>
                                                            </p>
                                                        <?php endif; ?>
                                                        <p class="el_doctorCard_txt_name"><?php the_title(); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endwhile;
                                wp_reset_postdata(); // リセット
                        endif;
                        ?>
                        </ul>
                        <div class="bl_commonBgContainer_txtContainer_btnContainer">
                            <a href="<?php echo home_url(); ?>/doctor/" class="bl_commonBorderRadialArrowBtn">
                                <p class="el_commonBorderRadialArrowBtn_txt">一覧に戻る</p>
                            </a>
                        </div>
                    </section>

                </div>
            </div>
        </div>


    </main><!-- /ly_main -->

    <?php get_footer(); ?>
</body>

</html>