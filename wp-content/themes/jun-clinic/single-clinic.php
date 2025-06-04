<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>

<body class="single_pg_clinic pg_top">
    <div class="bl_commonBgContainer">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/bg.png" alt="">
    </div>
    <?php get_header(); ?>

    <main class="ly_main ly_overBg">
    <div class="bl_commonPageTtlContainer">
        <?php get_template_part('inc/breadcrumbs'); ?>
        </div>
        <div class="el_pageTtlPost un_clinic">
            <div class="el_pageTtlPost_inner">
                <div class="el_pageTtlPost_inner_inner">
                    <?php if (get_field('clinic_ttl_catchcopy')): ?>
                        <p class="el_pageTtlPost_sub">“<?php echo get_field('clinic_ttl_catchcopy'); ?>”</p>
                    <?php endif; ?>
                </div>
                <h1 class="el_pageTtlPost_ja"><?php the_title(); ?></h1>
            </div>  
                                
            <div class="ly_commonContantsBgItemContainer ly_0uter">
                <picture class="ly_commonContantsBgItemContainer_item el_commonPageTtlContainer_waveLine">
                    <source
                        srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/page-wave-line-sp.png"
                        media="(max-width: 768px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/page-wave-line.png"
                        alt="">
                </picture>
                <section class="ly_commonContantsOuter ly_topRecommendSec">
                    <div class="ly_commonContantsOuter_inner">
                        <div class="bl_topRecommendSec_ttlContainer">
                            <hgroup class="bl_commonSectionTtl bl_topFeatureSec_ttl">
                                <p class="el_commonSectionTtl_ttl">Recommend</p>
                                <h2 class="el_commonSectionTtl_ttl_ttl">おすすめ治療</h2>
                            </hgroup>
                        </div>
                        <?php
                        $posts = get_field('clinic__recommend');
                        if( $posts ):
                        ?>
                        <ul class="bl_recommendBannerList">
                        <?php foreach( $posts as $post ): ?>
                            <li class="bl_recommendBannerList_item">
                            <a href="<?php echo get_permalink( $post->ID ); ?>" class="bl_recommendBannerList_item_btn">
                                <img src="<?php echo wp_get_attachment_url( the_field('favo-menuBtn-Img', $post->ID ) ); ?>" class="bl_recommendBannerList_item_bg"  alt="">
                                <div class="bl_recommendBannerList_item_txtContainer">
                                    <h3 class="bl_recommendBannerList_item_txtContainer_ttl"><?php echo get_the_title($post->ID); ?></h3>
                                    <p class="bl_recommendBannerList_item_txtContainer_txt"><?php the_field('favo-menubtn-txt', $post->ID); ?></p>
                                </div>
                            </a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </section>
            </div>

            <div class="ly_commonContantsBgItemContainer ly_0uter">
                <picture class="ly_commonContantsBgItemContainer_item">
                    <source
                        srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-sp.png"
                        media="(max-width: 768px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave.png"
                        alt="">
                </picture>
                <section class="ly_message ly_topRecommendSec">
                    <div class="ly_commonContantsOuter_inner">
                        <div class="bl_topRecommendSec_ttlContainer">
                            <hgroup class="bl_commonSectionTtl bl_topFeatureSec_ttl">
                                <p class="el_commonSectionTtl_ttl">Message</p>
                                <h2 class="el_commonSectionTtl_ttl_ttl">メッセージ</h2>
                            </hgroup>
                        </div>
                        <?php if (have_rows('message_cnt')): ?>
                            <div class="bl_messageCnt">
                                <div class="bl_messageCnt_item">
                                    <img class="bl_message_l" src="<?php the_field('message_img'); ?>"  alt="">
                                    <div class="bl_message_r">
                                        <?php if (have_rows('message_cnt')): ?>
                                            <?php while (have_rows('message_cnt')):
                                                the_row(); ?>
                                                <h3 class="el_message_ttl"><?php the_sub_field('message_ttl'); ?></h3>
                                                <div class="el_message_txt">
                                                    <p><?php the_sub_field('message_txt'); ?></p>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="clinic-slider splide clinic-slider_01" data-id="contents0<?php echo $i; ?>"
                                    aria-label=" Splide_01">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <?php if (have_rows('clinic_slider')): ?>
                                                <?php while (have_rows('clinic_slider')):
                                                    the_row(); ?>
                                                    <li class="splide__slide">
                                                        <img src="<?php the_sub_field('clinic_slider_img'); ?>"  alt="">
                                                    </li>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                    <?php else: ?>
                        <div class="bl_commonComingSoonTxtContainer">
                            <p class="el_commonComingSoonTxt">coming soon</p>
                        </div>
                    <?php endif; ?>
                    </div>
                </section>
                <picture class="ly_commonContantsBgItemContainer_item">
                    <source
                        srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-bottom-sp.png" media="(max-width: 768px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-bottom.png"
                        alt="">
                </picture>
            </div>

            <div class="ly_commonContantsBgItemContainer ly_0uter">
                <section class="ly_doctor ly_topRecommendSec">
                    <div class="ly_commonContantsOuter_inner">
                        <div class="bl_topRecommendSec_ttlContainer">
                            <hgroup class="bl_commonSectionTtl bl_topFeatureSec_ttl">
                                <p class="el_commonSectionTtl_ttl">Doctor</p>
                                <h2 class="el_commonSectionTtl_ttl_ttl">ドクター紹介</h2>
                            </hgroup>
                        </div>
                    </div>
                    <?php
                            $term_id = get_field('news_topics_place'); // 単一のタームIDが返る想定
                            $clinic_cat = null;

                            // 安全にターム取得
                            if (!empty($term_id) && is_int($term_id)) {
                                $clinic_cat = get_term($term_id, 'clinic-cat');
                            }

                            $args = array(
                                'post_type' => 'doctor',
                                'posts_per_page' => 3,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'clinic-cat',
                                        'field' => 'slug',
                                        'terms' => !empty($clinic_cat) ? $clinic_cat->slug : '', // 安全にスラッグ取得
                                    ),
                                ),
                            );

                            $the_query = new WP_Query($args);
                            ?>
                            <?php if ($the_query->have_posts()): ?>
                                <ul class="bl_doctorList">
                                    <?php while ($the_query->have_posts()):
                                        $the_query->the_post(); ?>
                                    <li class="bl_doctorList_item">
                                        <a href="<?php the_permalink(); ?>" class="bl_doctorList_item_link">
                                            <div class="bl_doctorCard">
                                                <div class="bl_doctorCard_inner">
                                                    <div class="el_doctorCard_img" >
                                                        <img src="<?php the_field('doctor_mini_img'); ?>"  alt="">
                                                    </div>
                                                    <div class="el_doctorCard_txt">
                                                        <p class="el_doctorCard_txt_job"><?php the_field('job'); ?></p>
                                                        <?php if (get_field('job_other')): ?>
                                                            <p class="el_doctorCard_txt_job_other"><?php the_field('job_other'); ?></p>
                                                        <?php endif; ?>
                                                        <p class="el_doctorCard_txt_name"><?php the_title(); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                </section>
            </div>
            <!-- お知らせ -->
            <div class="ly_commonContantsBgItemContainer">
                <picture class="ly_commonContantsBgItemContainer_item">
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-sp.png" media="(max-width: 768px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave.png" alt="">
                </picture>
                <section class="ly_commonContantsOuter ly_topNewsSec ly_instagram">
                    <div class="ly_commonContantsOuter_inner bl_topNewsSec_inner">
                        <div class="bl_topNewsSec_ttlContainer">
                            <div class="bl_topNewsSec_ttlContainer_inner">
                                <hgroup class="bl_commonSectionTtl bl_topNewsSec_ttlContainer">
                                    <p class="el_commonSectionTtl_ttl">Instagram</p>
                                    <h2 class="el_commonSectionTtl_ttl_ttl">公式インスタグラム</h2>
                                </hgroup>
                            </div>
                            <div class="bl_topNewsSec_btnContainer">
                                <a href="<?php the_field('instagram_url'); ?>" class="bl_commonBorderRadialArrowBtn" target="_blank">
                                    <p class="el_commonBorderRadialArrowBtn_txt">アカウントを見る</p>
                                    <div class="el_commonBorderRadialArrowBtn_arrowContainer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8">
                                            <path d="M7.46484 0.464844C7.66011 0.269582 7.97661 0.269582 8.17188 0.464844L11.3535 3.64648C11.5488 3.84175 11.5488 4.15825 11.3535 4.35352L8.17188 7.53516C7.97661 7.73042 7.66011 7.73042 7.46484 7.53516C7.26958 7.33989 7.26958 7.02339 7.46484 6.82813L9.79297 4.5H1C0.723858 4.5 0.5 4.27614 0.5 4C0.5 3.72386 0.723858 3.5 1 3.5H9.79297L7.46484 1.17188C7.26958 0.976613 7.26958 0.660106 7.46484 0.464844Z" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="bl_instagram_post">
                            <?php echo do_shortcode('[instagram-feed feed=3]'); ?>
                        </div>
                    </div>
                </section>
                <picture class="ly_commonContantsBgItemContainer_item">
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-bottom-sp.png" media="(max-width: 768px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-bottom.png" alt="">
                </picture>
            </div>

                <div class="ly_commonContantsBgItemContainer ly_0uter">
                    <section class="ly_commonContantsOuter ly_topTopicSec ly_topics ly_topRecommendSec">
                        <div class="ly_commonContantsOuter_inner">
                            <div class="bl_topRecommendSec_ttlContainer">
                                <hgroup class="bl_commonSectionTtl bl_topTopicSec_ttlContainer">
                                    <p class="el_commonSectionTtl_ttl">Topics</p>
                                    <h2 class="el_commonSectionTtl_ttl_ttl">トピックス</h2>
                                </hgroup>
                            </div>
                            <?php
                                    $term_id = get_field('news_topics_place'); // 単一のタームIDが返る想定
                                    $clinic_cat = null;

                                    // 安全にターム取得
                                    if (!empty($term_id) && is_int($term_id)) {
                                        $clinic_cat = get_term($term_id, 'clinic-cat');
                                    }

                                    $args = array(
                                        'post_type' => 'topics',
                                        'posts_per_page' => 6,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'clinic-cat',
                                                'field' => 'slug',
                                                'terms' => !empty($clinic_cat) ? $clinic_cat->slug : '', // 安全にスラッグ取得
                                            ),
                                        ),
                                    );
                                    $the_query = new WP_Query($args);
                                    ?>
                            <?php if ($the_query->have_posts()): ?>
                            <div class=" splide splide_topics">
                                <div class="splide__track splide__track_topics">
                                        <ul class="splide__list splide__list_topics">
                                            <?php while ($the_query->have_posts()):
                                                $the_query->the_post(); ?>
                                                <li class="splide__slide splide__slide_topics">
                                                    <a href="<?php the_permalink(); ?>" class="bl_topicsList_item_link">
                                                        <div class="bl_topicsList_item_link_imgContainer">
                                                            <?php if (has_post_thumbnail()): ?>
                                                                <img class="bl_topicsList_item_link_img"
                                                                    src="<?php the_post_thumbnail_url(); ?>"
                                                                    alt="<?php the_title(); ?>">
                                                            <?php else: ?>
                                                                <img class="bl_topicsList_item_link_img"
                                                                    src="<?php echo get_template_directory_uri(); ?>/assets/img/common/no-post.jpg"
                                                                    alt="<?php the_title(); ?>">
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="bl_topicsList_item_link_infoContainer">
                                                            <div class="bl_topicsList_item_link_info">
                                                                <p class="bl_topicsList_item_link_info_date">
                                                                    <?php the_date('Y.m.d'); ?>
                                                                </p>
                                                                <?php
                                                                $taxonomies = array('clinic-cat', 'topics-cat');
                                                                $terms_list = array();
                                                                foreach ($taxonomies as $taxonomy) {
                                                                    $terms = get_the_terms(get_the_ID(), $taxonomy);
                                                                    if ($terms && !is_wp_error($terms)) {
                                                                        foreach ($terms as $term) {
                                                                            $terms_list[] = $term->name;
                                                                        }
                                                                    }
                                                                }
                                                                if (!empty($terms_list)): ?>
                                                                    <div class="bl_topicsList_item_link_info_termContainer">
                                                                        <?php foreach ($terms_list as $term): ?>
                                                                            <p class="bl_topicsList_item_link_info_term">
                                                                                <?php echo esc_html($term); ?>
                                                                            </p>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <p class="el_topicsList_item_link_ttl"><?php the_title(); ?></p>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                </div>

                            </div>

                            <?php else: ?>
                                <div class="bl_commonComingSoonTxtContainer">
                                    <p class="el_commonComingSoonTxt">coming soon</p>
                                </div>
                            <?php endif; ?>
                             <?php wp_reset_postdata(); ?>
                        </div>
                    </section>

                </div>
                <!-- お知らせ -->
            <div class="ly_commonContantsBgItemContainer">
                <picture class="ly_commonContantsBgItemContainer_item">
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-sp.png" media="(max-width: 768px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave.png" alt="">
                </picture>
                <section class="ly_commonContantsOuter ly_topNewsSec ly_news">
                    <div class="ly_commonContantsOuter_inner bl_topNewsSec_inner">
                        <div class="bl_topNewsSec_ttlContainer">
                            <div class="bl_topNewsSec_ttlContainer_inner">
                                <hgroup class="bl_commonSectionTtl bl_topNewsSec_ttlContainer">
                                    <p class="el_commonSectionTtl_ttl">News</p>
                                    <h2 class="el_commonSectionTtl_ttl_ttl">お知らせ</h2>
                                </hgroup>
                            </div>
                            <!-- <div class="bl_topNewsSec_btnContainer">
                                <a href="#" class="bl_commonBorderRadialArrowBtn">
                                    <p class="el_commonBorderRadialArrowBtn_txt">お知らせ一覧</p>
                                    <div class="el_commonBorderRadialArrowBtn_arrowContainer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8">
                                            <path d="M7.46484 0.464844C7.66011 0.269582 7.97661 0.269582 8.17188 0.464844L11.3535 3.64648C11.5488 3.84175 11.5488 4.15825 11.3535 4.35352L8.17188 7.53516C7.97661 7.73042 7.66011 7.73042 7.46484 7.53516C7.26958 7.33989 7.26958 7.02339 7.46484 6.82813L9.79297 4.5H1C0.723858 4.5 0.5 4.27614 0.5 4C0.5 3.72386 0.723858 3.5 1 3.5H9.79297L7.46484 1.17188C7.26958 0.976613 7.26958 0.660106 7.46484 0.464844Z" />
                                        </svg>
                                    </div>
                                </a>
                            </div> -->
                        </div>
                        <div class="bl_topNewsSec_newsListContainer">
                            <?php
                            $term_id = get_field('news_topics_place'); // 単一のタームIDが返る想定
                            $clinic_cat = null;

                            // ターム取得
                            if (!empty($term_id) && is_int($term_id)) {
                                $clinic_cat = get_term($term_id, 'clinic-cat');
                            }

                            $args = array(
                                'post_type' => 'news',
                                'posts_per_page' => 3,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'clinic-cat',
                                        'field' => 'slug',
                                        'terms' => !empty($clinic_cat) ? $clinic_cat->slug : '', // 安全にスラッグ取得
                                    ),
                                ),
                            );

                            $the_query = new WP_Query($args);
                            ?>
                            <?php if ($the_query->have_posts()): ?>

                                <ul class="bl_newsList">
                                    <?php while ($the_query->have_posts()):
                                        $the_query->the_post(); ?>

                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'clinic-cat');
                                        $clinic_name = '';
                                        if ($terms && !is_wp_error($terms) && !empty($terms)) {
                                            $clinic_name = $terms[0]->name;
                                        }
                                        ?>

                                        <li class="bl_newsList_item">
                                            <a href="<?php the_permalink(); ?>" class="bl_newsList_item_link">
                                                <div class="bl_newsList_item_link_infoContainer">
                                                    <p class="bl_newsList_item_link_infoContainer_date">
                                                        <?php the_date('Y.m.d'); ?>
                                                    </p>
                                                    <?php if (!empty($clinic_name)): ?>
                                                        <p class="bl_newsList_item_link_infoContainer_clinic">
                                                            <?php echo esc_html($clinic_name); ?>
                                                        </p>
                                                    <?php endif; ?>
                                                </div>
                                                <p class="bl_newsList_item_link_ttl"><?php the_title(); ?></p>
                                            </a>
                                        </li>

                                    <?php endwhile; ?>
                                </ul>

                                <?php else: ?>
                                <div class="bl_commonComingSoonTxtContainer">
                                    <p class="el_commonComingSoonTxt">coming soon</p>
                                </div>
                            <?php endif; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </section>
                <picture class="ly_commonContantsBgItemContainer_item">
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-bottom-sp.png" media="(max-width: 768px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-bottom.png" alt="">
                </picture>
            </div>

            <div class="ly_commonContantsBgItemContainer ly_0uter">
                <section class="ly_schedule ly_topRecommendSec">
                    <div class="ly_commonContantsOuter_inner">
                        <div class="bl_topRecommendSec_ttlContainer">
                            <hgroup class="bl_commonSectionTtl bl_topFeatureSec_ttl">
                                <p class="el_commonSectionTtl_ttl">Schedule</p>
                                <h2 class="el_commonSectionTtl_ttl_ttl">スケジュール</h2>
                            </hgroup>
                        </div>
                        <div class="bl_scheduleCnt">
                            <div class="bl_scheduleCnt_item">
                                <div class="schedule-slider splide schedule-slider_01" aria-label="Splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <?php if (have_rows('schedule_slider')): ?>
                                                <?php while (have_rows('schedule_slider')):
                                                    the_row(); ?>
                                                    <li class="splide__slide">
                                                        <img src="<?php the_sub_field('schedule_slider_img'); ?>"  alt="">
                                                    </li>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="ly_commonContantsBgItemContainer ly_0uter">
                <picture class="ly_commonContantsBgItemContainer_item">
                    <source
                        srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-sp.png"
                        media="(max-width: 768px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave.png"
                        alt="">
                </picture>
                <section class="ly_information ly_0uter ly_topRecommendSec">
                    <div class="ly_commonContantsOuter_inner">
                        <div class="bl_topRecommendSec_ttlContainer">
                            <hgroup class="bl_commonSectionTtl bl_topFeatureSec_ttl">
                                <p class="el_commonSectionTtl_ttl">Information</p>
                                <h2 class="el_commonSectionTtl_ttl_ttl">診療情報</h2>
                            </hgroup>
                        </div>
                        <div class="bl_informationCnt">
                            <dl>
                                <dt>クリニック名</dt>
                                <dd><?php the_title(); ?></dd>
                                <?php if (get_field('director')): ?>
                                    <dt>院長</dt>
                                    <dd><?php the_field('director'); ?></dd>
                                <?php endif; ?>
                                <?php if (get_field('department')): ?>
                                    <dt>診療科目</dt>
                                    <dd><?php
                                        $values = get_field('department');
                                        if ($values) {
                                            foreach ($values as $index => $value) {
                                                echo ($index > 0 ? '・' : '') . esc_html($value);
                                            }
                                        }
                                        ?></dd>
                                <?php endif; ?>
                                <?php if (get_field('address')): ?>
                                    <dt>所在地</dt>
                                    <dd class="bl_informationCnt_googleMapLink"><?php the_field('address'); ?><br><?php if (get_field('google_map')) : ?>
                                                        <a href="<?php echo get_field('google_map'); ?>" class="bl_clinicList_item_infoContainer_item_link" target="_blank">
                                                            <p class="el_clinicList_item_infoContainer_item_link_txt">Google Maps</p>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" class="el_clinicList_item_infoContainer_item_link_icon" alt="Google Maps">
                                                        </a>
                                                    <?php endif; ?></dd>
                                <?php endif; ?>
                                <?php if (get_field('time')): ?>
                                    <dt>診療時間</dt>
                                    <dd><?php the_field('time'); ?></dd>
                                <?php endif; ?>
                                <?php if (get_field('closed')): ?>
                                    <dt>休診日</dt>
                                    <dd><?php the_field('closed'); ?></dd>
                                <?php endif; ?>
                                <?php if (get_field('tell')): ?>
                                    <dt>電話番号</dt>
                                    <dd><?php the_field('tell'); ?></dd>
                                <?php endif; ?>
                                <?php if (get_field('pay')): ?>
                                    <dt>支払い方法</dt>
                                    <dd><?php the_field('pay'); ?></dd>
                                <?php endif; ?>
                            </dl>
                        </div>
                    </div>
                </section>
                <picture class="ly_commonContantsBgItemContainer_item">
                    <source
                        srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-bottom-sp.png"
                        media="(max-width: 768px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-bottom.png"
                        alt="">
                </picture>
            </div>

            <div class="ly_commonContantsBgItemContainer ly_0uter">
                <section class="ly_access ly_topRecommendSec">
                    <div class="ly_commonContantsOuter_inner">
                        <div class="bl_topRecommendSec_ttlContainer">
                            <hgroup class="bl_commonSectionTtl bl_topFeatureSec_ttl">
                                <p class="el_commonSectionTtl_ttl">Access</p>
                                <h2 class="el_commonSectionTtl_ttl_ttl">アクセス</h2>
                            </hgroup>
                        </div>
                        <?php if (have_rows('step')): ?>
                            <?php $i = 1; ?>
                            <?php while (have_rows('step')):
                                the_row(); ?>
                                <div class="access-steps access-slider_01" data-id="contents0<?php echo $i; ?>">
                                    <h3 class="bl_accessInfoContainer_inner"><?php the_sub_field('access_ttl'); ?></h3>
                                    <div class="access-steps_inner">
                                        <div class="">
                                            <?php if (have_rows('access_step')): ?>
                                                <?php $step = 1; ?>
                                                <?php while (have_rows('access_step')):
                                                    the_row(); ?>
                                                    <div class="access_step">
                                                        <div class="step_image">
                                                            <figure>
                                                                <img src="<?php the_sub_field('access_step_img'); ?>"
                                                                    alt="<?php the_sub_field('access_ttl'); ?>">
                                                            </figure>
                                                        </div>
                                                        <div class="bl_access_txtWrapper">
                                                            <div class="el_reservationContainerList_upper_num">
                                                                <p>Step<?php echo sprintf("%02d", $step); ?></p>
                                                            </div>
                                                            <div class="step-description"><?php the_sub_field('access_step_txt'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $step++; ?>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <div class="access_parking">
                            <div class="access_parking_inner">
                                <div class="access_parking_l">
                                    <img src="<?php the_field('parking_img'); ?>" alt="">
                                </div>
                                <div class="access_parking_r">
                                    <h3 class="el_access_ttl">駐車場のご案内</h3>
                                    <div class="el_access_txt">
                                        <?php the_field('parking_txt'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main><!-- /ly_main -->

    <?php get_footer(); ?>

</body>

</html>