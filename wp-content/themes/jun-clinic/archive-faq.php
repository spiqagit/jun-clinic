<?php get_header('meta'); ?>
<?php wp_head(); ?>
<?php
//構造化用
$faq_query = new WP_Query(array(
    'post_type' => 'faq',
    'posts_per_page' => -1
));
if ($faq_query->have_posts()) :
    $faq_data = array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array()
    );
    while ($faq_query->have_posts()) : $faq_query->the_post();
        $faq_data['mainEntity'][] = array(
            '@type' => 'Question',
            'name' => get_the_title(),
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => get_the_content()
            )
        );
    endwhile;
    echo '<script type="application/ld+json">' . json_encode($faq_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
    wp_reset_postdata();
endif;
?>
</head>
<body class="pg_faq">
<?php get_header(); ?>

<main class="ly_main">

<hgroup class="el_pageTtl">
    <h1 class="el_pageTtl_en">FAQ</h1>
    <p class="el_pageTtl_ja">よくある質問</p>
</hgroup><!-- /el_pageTtl -->

<div class="ly_inner">
    <?php
    $args = array(
        'post_type' => 'faq',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    $faq_post = new WP_Query($args);
    $terms = get_terms(array(
        'taxonomy' => 'faq-cat',
        'hide_empty' => false,
    ));
    if ($faq_post->have_posts()) { 
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $query = new WP_Query(array(
                    'post_type' => 'faq',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'faq-cat',
                            'field' => 'slug',
                            'terms' => $term->slug,
                        ),
                    ),
                ));
                if ($query->have_posts()) { ?>
                    <section class="ly_secFaq">
                        <h2 class="el_secTtl"><?php echo esc_attr($term->name) ?></h2>
                        <dl class="el_faqList">
                        <?php while ($query->have_posts()) {
                        $query->the_post(); ?>
                            <div class="el_faqList_wrap">
                                <dt class="js_acc_ttl">
                                    <span class="el_faqList_q">Q</span>
                                    <?php echo get_the_title(); ?>
                                    <span class="el_faqList_ico"></span>
                                </dt>
                                <dd class="js_acc_cont">
                                    <?php echo get_the_content(); ?>
                                </dd>
                            </div>
                        <?php } wp_reset_postdata(); ?>
                        </dl>
                    </section><!-- /ly_secFaq -->
            <?php } wp_reset_postdata();
            }
        }
    }else{ ?>
        <p class="el_text_ready">準備中</p>
    <?php } ?>
</div><!-- /ly_inner -->

</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

</body>
</html>
