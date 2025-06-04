<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>

<body class="pg_archiveDoctor">
    <div class="bl_commonBgContainer">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/bg.png" alt="">
    </div>
    <?php get_header(); ?>

    <main class="ly_main">
        <div class="bl_commonPageTtlContainer">
            <?php get_template_part('inc/breadcrumbs'); ?>
        </div>
        <div class="el_pageTtlPost un_clinic">
            <div class="el_pageTtlPost_inner">
                <div class="bl_commonPageTtlContainer">
                    <div class="bl_commonPageTtlContainer_inner">
                        <h1 class="el_commonPageTtlContainer_inner_ttl">ドクター一覧</h1>
                    </div>
                    <picture class="el_commonPageTtlContainer_waveLine">
                        <source
                            srcset="https://stg03-spiqadesign.com/jun-clinic/wp-content/themes/jun-clinic/assets/img/common/page-wave-line-sp.png"
                            media="(max-width: 768px)">
                        <img src="https://stg03-spiqadesign.com/jun-clinic/wp-content/themes/jun-clinic/assets/img/common/page-wave-line.png"
                            alt="">
                    </picture>
                </div>
                <div class="ly_commonContantsBgItemContainer ly_0uter">

                    <?php
                    // 事前にカテゴリを取得
                    $job_terms = get_terms(['taxonomy' => 'job_cat', 'hide_empty' => false, 'orderby' => 'term_order']);
                    $clinic_terms = get_terms(['taxonomy' => 'clinic-cat', 'hide_empty' => false, 'orderby' => 'term_order']);
                    ?>

                    <!-- ページ内リンクナビ -->
                    <nav class="doctor-nav">
                        <ul class="doctor-nav_list">
                        <li><a href="#director">理事長<span class="doctor-nav_list_arrow"></span></a></li>
                            <?php

                            // clinic-cat の投稿があるタームだけループ
                            foreach ($clinic_terms as $term) {
                                $query = new WP_Query([
                                    'post_type' => 'doctor',
                                    'posts_per_page' => 1,
                                    'tax_query' => [
                                        [
                                            'taxonomy' => 'clinic-cat',
                                            'field' => 'term_id',
                                            'terms' => $term->term_id,
                                        ]
                                    ]
                                ]);
                                if ($query->have_posts()) {
                                    echo '<li><a href="#' . esc_attr($term->slug) . '">' . esc_html($term->name) . '院 ' . ' <span class="doctor-nav_list_arrow"></span></a></li>';
                                }
                                wp_reset_postdata();
                            }
                            ?>
                        </ul>
                    </nav>
                    <section class="ly_archiveDoctor">
                        <?php
                        // ===============================
                        // ① job_cat ごとのループ表示
                        // ===============================


                        ?>
                            <section class="jobCatSection">

                                        <div class="bl_doctorList_ttl">
                                            <h2 class="CatTitle" id="director">
                                                理事長
                                            </h2>
                                        </div>
                                        <ul class="bl_doctorList">
                                        <?php
                                        // 理事長ーループ
                                        $doctors = new WP_Query([
                                            'post_type'      => 'doctor',
                                            'posts_per_page' => -1,
                                            'orderby'        => 'menu_order',
                                            'order'          => 'ASC',
                                        ]);

                                        if ($doctors->have_posts()) :
                                            while ($doctors->have_posts()) :
                                                $doctors->the_post();

                                                if (have_rows('doctor_clinic')) :
                                                    while (have_rows('doctor_clinic')) : the_row();
                                                        
                                                            $job       = get_sub_field('doctor_clinic__job');
                                                            $job_other = get_sub_field('doctor_clinic__post');
                                                            ?>
                                                            <?php if($job == '理事長'): ?>
                                                            <li class="bl_doctorList_item">
                                                                <a href="<?php the_permalink(); ?>" class="bl_doctorList_item_link">
                                                                    <div class="bl_doctorCard">
                                                                        <div class="bl_doctorCard_inner">
                                                                            <div class="el_doctorCard_img">
                                                                                <?php if (get_field('doctor_mini_img')) : ?>
                                                                                    <img src="<?php the_field('doctor_mini_img'); ?>" alt="<?php the_title(); ?>">
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <div class="el_doctorCard_txt">
                                                                                <?php if ($job) : ?>
                                                                                    <p class="el_doctorCard_txt_job"><?php echo esc_html($job); ?></p>
                                                                                <?php endif; ?>
                                                                                <?php if ($job_other) : ?>
                                                                                    <p class="el_doctorCard_txt_job_other"><?php echo esc_html($job_other); ?></p>
                                                                                <?php endif; ?>
                                                                                <p class="el_doctorCard_txt_name"><?php the_title(); ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <?php endif; ?>
                                                        <?php
                                                    endwhile;
                                                endif;
                                            endwhile;
                                            wp_reset_postdata();
                                        endif;
                                        ?>
                                    </ul>

                                        <?php wp_reset_postdata(); ?>
                            </section>
                        

                       
                        <?php
                        $clinic_terms = get_terms([
                            'taxonomy'   => 'clinic-cat',
                            'hide_empty' => false,
                            'orderby'    => 'term_order',
                        ]);

                        if (!empty($clinic_terms) && !is_wp_error($clinic_terms)) :
                        ?>
                            <section class="clinicCatSection">
                                <?php foreach ($clinic_terms as $clinic_term) : ?>
                                    <div class="bl_doctorList_ttl">
                                        <h2 class="CatTitle" id="<?php echo esc_attr($clinic_term->slug); ?>">
                                            <?php echo esc_html($clinic_term->name); ?>院
                                        </h2>
                                    </div>
                                    <ul class="bl_doctorList">
                                    <?php
                                        // 院長ループ
                                        $clinic_director = new WP_Query([
                                            'post_type'      => 'doctor',
                                            'posts_per_page' => -1,
                                            'orderby'        => 'menu_order',
                                            'order'          => 'ASC',
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'clinic-cat',
                                                    'field' => 'term_id',
                                                    'terms' => $clinic_term->term_id
                                                )
                                            ),
                                        ]);
                                        if ($clinic_director->have_posts()) :
                                            while ($clinic_director->have_posts()) :
                                                $clinic_director->the_post();

                                                if (have_rows('doctor_clinic')) :
                                                    while (have_rows('doctor_clinic')) : the_row();
                                                        $term = get_sub_field('doctor_clinic__clinic');
                                                        if ($term && $term->term_id === $clinic_term->term_id): //繰り返しフィールド内で選択された clinic-cat タームと、今ループしている院のタームが同じかどうかをチェック
                                                            $job       = get_sub_field('doctor_clinic__job');
                                                            $job_other = get_sub_field('doctor_clinic__post');
                                                            ?>
                                                            <?php if($job == '院長'): ?>
                                                            <li class="bl_doctorList_item">
                                                                <a href="<?php the_permalink(); ?>" class="bl_doctorList_item_link">
                                                                    <div class="bl_doctorCard">
                                                                        <div class="bl_doctorCard_inner">
                                                                            <div class="el_doctorCard_img">
                                                                                <?php if (get_field('doctor_mini_img')) : ?>
                                                                                    <img src="<?php the_field('doctor_mini_img'); ?>" alt="<?php the_title(); ?>">
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <div class="el_doctorCard_txt">
                                                                                <?php if ($job) : ?>
                                                                                    <p class="el_doctorCard_txt_job"><?php echo esc_html($clinic_term->name); ?>院 <?php echo esc_html($job); ?></p>
                                                                                <?php endif; ?>
                                                                                <?php if ($job_other) : ?>
                                                                                    <p class="el_doctorCard_txt_job_other"><?php echo esc_html($job_other); ?></p>
                                                                                <?php endif; ?>
                                                                                <p class="el_doctorCard_txt_name"><?php the_title(); ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <?php endif; ?>
                                                        <?php
                                                        endif;
                                                    endwhile;
                                                endif;
                                            endwhile;
                                            wp_reset_postdata();
                                        endif;
                                        ?>
                                        <?php
                                        // ドクターループ
                                        $doctors = new WP_Query([
                                            'post_type'      => 'doctor',
                                            'posts_per_page' => -1,
                                            'orderby'        => 'menu_order',
                                            'order'          => 'ASC',
                                        ]);

                                        if ($doctors->have_posts()) :
                                            while ($doctors->have_posts()) :
                                                $doctors->the_post();

                                                if (have_rows('doctor_clinic')) :
                                                    while (have_rows('doctor_clinic')) : the_row();
                                                        $term = get_sub_field('doctor_clinic__clinic');
                                                        if ($term && $term->term_id === $clinic_term->term_id) : //繰り返しフィールド内で選択された clinic-cat タームと、今ループしている院のタームが同じかどうかをチェック
                                                            $job       = get_sub_field('doctor_clinic__job');
                                                            $job_other = get_sub_field('doctor_clinic__post');
                                                            ?>
                                                            <?php if($job != '院長' && $job != '理事長'): ?>
                                                            <li class="bl_doctorList_item">
                                                                <a href="<?php the_permalink(); ?>" class="bl_doctorList_item_link">
                                                                    <div class="bl_doctorCard">
                                                                        <div class="bl_doctorCard_inner">
                                                                            <div class="el_doctorCard_img">
                                                                                <?php if (get_field('doctor_mini_img')) : ?>
                                                                                    <img src="<?php the_field('doctor_mini_img'); ?>" alt="<?php the_title(); ?>">
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <div class="el_doctorCard_txt">
                                                                                <?php if ($job) : ?>
                                                                                    <p class="el_doctorCard_txt_job"><?php echo esc_html($clinic_term->name); ?>院 <?php echo esc_html($job); ?></p>
                                                                                <?php endif; ?>
                                                                                <?php if ($job_other) : ?>
                                                                                    <p class="el_doctorCard_txt_job_other"><?php echo esc_html($job_other); ?></p>
                                                                                <?php endif; ?>
                                                                                <p class="el_doctorCard_txt_name"><?php the_title(); ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <?php endif; ?>
                                                        <?php
                                                        endif;
                                                    endwhile;
                                                endif;
                                            endwhile;
                                            wp_reset_postdata();
                                        endif;
                                        ?>
                                        <?php
                                        // 理事長ーループ
                                        $doctors = new WP_Query([
                                            'post_type'      => 'doctor',
                                            'posts_per_page' => -1,
                                            'orderby'        => 'menu_order',
                                            'order'          => 'ASC',
                                        ]);

                                        if ($doctors->have_posts()) :
                                            while ($doctors->have_posts()) :
                                                $doctors->the_post();

                                                if (have_rows('doctor_clinic')) :
                                                    while (have_rows('doctor_clinic')) : the_row();
                                                        
                                                            $job       = get_sub_field('doctor_clinic__job');
                                                            $job_other = get_sub_field('doctor_clinic__post');
                                                            $clinic_name = get_sub_field('doctor_clinic__clinic');
                                                            ?>
                                                            <?php if($job === '理事長' && $clinic_term->slug !== 'nagano'): ?>
                                                            <li class="bl_doctorList_item">
                                                                <a href="<?php the_permalink(); ?>" class="bl_doctorList_item_link">
                                                                    <div class="bl_doctorCard">
                                                                        <div class="bl_doctorCard_inner">
                                                                            <div class="el_doctorCard_img">
                                                                                <?php if (get_field('doctor_mini_img')) : ?>
                                                                                    <img src="<?php the_field('doctor_mini_img'); ?>" alt="<?php the_title(); ?>">
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <div class="el_doctorCard_txt">
                                                                                <?php if ($job) : ?>
                                                                                    <p class="el_doctorCard_txt_job"><?php echo esc_html($job); ?></p>
                                                                                <?php endif; ?>
                                                                                <?php if ($job_other) : ?>
                                                                                    <p class="el_doctorCard_txt_job_other"><?php echo esc_html($job_other); ?></p>
                                                                                <?php endif; ?>
                                                                                <p class="el_doctorCard_txt_name"><?php the_title(); ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <?php endif; ?>
                                                        <?php
                                                    endwhile;
                                                endif;
                                            endwhile;
                                            wp_reset_postdata();
                                        endif;
                                        ?>
                                    </ul>
                                <?php endforeach; ?>
                            </section>
                        <?php endif; ?> 
                    </section>
                </div>
            </div>
        </div>

        



    </main><!-- /ly_main -->

    <?php get_footer(); ?>
    <?php get_footer('meta'); ?>

</body>

</html>