<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>
<body class="pg_doctor">
<?php get_header(); ?>

<main class="ly_main">

<hgroup class="el_pageTtl">
    <h1 class="el_pageTtl_en">DOCTOR</h1>
    <p class="el_pageTtl_ja">医師紹介</p>
</hgroup><!-- /el_pageTtl -->

<ul class="el_doctorList">
<?php while (have_posts()) : the_post(); ?>
<li>
<div class="el_doctorList_top">
    <figure class="el_doctorList_img">
        <img src="<?php echo get_field('img'); ?>" alt="<?php echo get_field('job'); ?> <?php echo $post->post_title; ?>">
    </figure>
    <div class="el_doctorList_textWrap">
        <div class="el_doctorList_nameWrap">
            <?php if(get_field('job')): ?>
                <span class="el_doctorList_job"><?php echo get_field('job'); ?></span>
            <?php endif; ?>
            <h2 class="el_doctorList_name"><?php echo $post->post_title; ?></h2>
        </div>
        <?php if(get_field('en_text')): ?>
            <div class="el_doctorList_enName"><?php echo get_field('en_text'); ?></div>
        <?php endif; ?>
        <?php if(get_field('profile')): ?>
            <div class="el_doctorList_profile"><?php echo get_field('profile'); ?></div>
        <?php endif; ?>
        
    </div><!-- /el_doctorList_prof -->
</div><!-- /el_doctorList_top -->

<div class="el_doctorList_bottom">
    <?php if(have_rows('history')): ?>
        <div class="el_doctorList_wrap">
            <h3 class="el_doctorList_ttl">経歴</h3>
            <dl class="el_historyList">
                <?php while(have_rows('history')): the_row(); ?>
                    <dt><?php echo get_sub_field('year'); ?></dt>
                    <dd><?php echo get_sub_field('text'); ?></dd>
                <?php endwhile; ?>
            </dl>
        </div>
    <?php endif; ?>

    <?php if(have_rows('sns_list')): ?>
        <div class="el_doctorList_wrap">
            <h3 class="el_doctorList_ttl">SNS</h3>
            <ul class="el_doctorList_sns">
                <?php while(have_rows('sns_list')): the_row(); ?>
                    <li>
                        <a href="<?php echo get_sub_field('url'); ?>" target="_blank">
                            <span class="el_doctorList_sns_ico">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/ico_<?php echo get_sub_field('type'); ?>-clr.png" alt="<?php echo get_sub_field('type'); ?>">
                            </span>
                            <span class="el_doctorList_sns_text"><?php echo get_sub_field('text'); ?></span>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>

</li>
<?php endwhile; ?>
</ul><!-- /el_doctorList -->




</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

</body>
</html>
