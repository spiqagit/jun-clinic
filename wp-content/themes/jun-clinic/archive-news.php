<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>
<body class="pg_news">
<?php get_header(); ?>

<main class="ly_main">

<hgroup class="el_pageTtl">
    <h1 class="el_pageTtl_en">NEWS</h1>
    <p class="el_pageTtl_ja">お知らせ</p>
</hgroup><!-- /el_pageTtl -->

<div class="ly_inner">
    <div class="el_news_posts">
        <?php if (have_posts()) : ?>
        <ul class="el_newsList">
            <?php while (have_posts()) : the_post(); ?>
                <li class="el_newsList_item">
                    <a href="<?php the_permalink(); ?>">
                        <time class="el_newsList_date" datetime="<?php echo get_post_time('Y-m-d'); ?>"><?php echo get_post_time('Y.m.d'); ?></time>
                        <p class="el_newsList_ttl"><?php echo $post->post_title; ?></p>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul><!-- /el_topics_list -->
        <?php else : ?>
            <p class="el_text_ready">準備中</p>
        <?php endif; ?>
        
        <div class="el_pager">
        <?php
        the_posts_pagination(array(
            'mid_size' => 0,
            'prev_text' => __('<svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none"><path d="M0.646446 4.85355C0.451185 4.65829 0.451185 4.34171 0.646446 4.14645L3.82843 0.964466C4.02369 0.769204 4.34027 0.769204 4.53553 0.964466C4.7308 1.15973 4.7308 1.47631 4.53553 1.67157L1.70711 4.5L4.53553 7.32843C4.7308 7.52369 4.7308 7.84027 4.53553 8.03553C4.34027 8.2308 4.02369 8.2308 3.82843 8.03553L0.646446 4.85355ZM17 5H1V4H17V5Z" fill="#222222"/></svg><span class="el_pager_text">PREV</span>', 'textdomain'),
            'next_text' => __('<span class="el_pager_text">NEXT</span><svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none"><path d="M16.3536 4.85355C16.5488 4.65829 16.5488 4.34171 16.3536 4.14645L13.1716 0.964466C12.9763 0.769204 12.6597 0.769204 12.4645 0.964466C12.2692 1.15973 12.2692 1.47631 12.4645 1.67157L15.2929 4.5L12.4645 7.32843C12.2692 7.52369 12.2692 7.84027 12.4645 8.03553C12.6597 8.2308 12.9763 8.2308 13.1716 8.03553L16.3536 4.85355ZM0 5H16V4H0V5Z" fill="#222222"/></svg>', 'textdomain'),
        ));
        ?>
        </div><!-- /el_pager -->    
    </div><!-- /el_news_posts -->
</div><!-- /ly_inner -->

</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

</body>
</html>
