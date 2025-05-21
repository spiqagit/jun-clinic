<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>
<body class="pg_column">
<?php get_header(); ?>

<main class="ly_main">

<div class="el_pageTtlPost un_column">
    <div class="el_pageTtlPost_inner">
        <span class="el_pageTtlPost_en">COLUMN</span>
        <h1 class="el_pageTtlPost_ja"><?php the_title(); ?></h1>
        <time class="el_pageTtlPost_date" datetime="<?php echo get_post_time('Y-m-d'); ?>"><?php echo get_post_time('Y.m.d'); ?></time>  
        <span class="el_pageTtlPost_category">
            <?php
            $themes = get_field('menu_select');
            if( $themes ):
            ?>
                <span class="el_caseList_theme">
                <?php foreach( $themes as $theme ): ?>
                    <a href="<?php echo home_url(); ?>/column/?s=&theme=<?php echo $theme->ID; ?>"><span><?php echo get_the_title( $theme->ID ); ?></span></a>
                <?php endforeach; ?>
                </span>
            <?php endif; wp_reset_postdata(); ?>
            <?php
            $terms = get_the_terms(get_the_ID(), 'column-key');
            if ($terms && !is_wp_error($terms)) { ?>
            <span class="el_caseList_key">
                <span class="el_caseList_key_ico">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <g clip-path="url(#clip0_4963_12087)">
                            <path d="M4.58268 7.83366C4.25116 7.83366 3.93322 7.70196 3.6988 7.46754C3.46438 7.23312 3.33268 6.91518 3.33268 6.58366C3.33268 6.25214 3.46438 5.9342 3.6988 5.69978C3.93322 5.46535 4.25116 5.33366 4.58268 5.33366C4.9142 5.33366 5.23215 5.46535 5.46657 5.69978C5.70099 5.9342 5.83268 6.25214 5.83268 6.58366C5.83268 6.91518 5.70099 7.23312 5.46657 7.46754C5.23215 7.70196 4.9142 7.83366 4.58268 7.83366ZM17.841 11.6503L10.341 4.15033C10.041 3.85033 9.62435 3.66699 9.16602 3.66699H3.33268C2.40768 3.66699 1.66602 4.40866 1.66602 5.33366V11.167C1.66602 11.6253 1.84935 12.042 2.15768 12.342L9.64935 19.842C9.95768 20.142 10.3743 20.3337 10.8327 20.3337C11.291 20.3337 11.7077 20.142 12.0077 19.842L17.841 14.0087C18.1493 13.7087 18.3327 13.292 18.3327 12.8337C18.3327 12.367 18.141 11.9503 17.841 11.6503Z" fill="#4F4643"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_4963_12087">
                            <rect width="20" height="20" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </span>
                <?php foreach ($terms as $term) {
                    echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html($term->name) . '</a>';
                } ?>
            </span>
            <?php } ?>
        </span>
    </div>
</div><!-- /ly_pageTtl -->


<div class="ly_2col un_column un_single">
    <div class="el_columnPosts">
        <?php if (has_post_thumbnail()) : ?>
            <figure class="el_post_thumb"><?php the_post_thumbnail( 'full' ); ?></figure>
        <?php endif ; ?>
        <div class="el_edit">
            <?php the_content(); ?>
        </div>
        <div class="el_postShare">
            <p class="el_postShare_ttl">記事をシェアする</p>
            <ul class="el_share_list">
                <li><a data-clipboard-text="<?php the_permalink(); ?>" class="js_shareurl un_url">
                    <span class="el_share_ico"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/ico_link-share.svg" alt=""></span>
                    <span class="el_share_text">リンクをコピー</span>
                </a></li>
                <li><a href="http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener">
                    <span class="el_share_ico"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/ico_Facebook-share.svg" alt=""></span>
                </a></li>
                <li><a href="https://social-plugins.line.me/lineit/share?url=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener">
                    <span class="el_share_ico"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/ico_Line-share.svg" alt=""></span>
                </a></li>
                <li><a href="https://x.com/intent/tweet?url=<?php echo get_the_permalink();?>&text=<?php echo get_the_title();?>" target="_blank" rel="nofollow noopener">
                    <span class="el_share_ico"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/ico_X-share.svg" alt=""></span>
                </a></li>  
            </ul>

        </div><!-- /el_post_share -->

        <?php
        $terms = get_the_terms($post->ID, 'column-supervisor');
        if ($terms) {
        echo '<ul class="el_author">';
        foreach ($terms as $term) {
        ?>
            <li class="el_author_item">
                <div class="el_author_top">
                    <?php if (get_field('img', $term)) : ?>
                        <div class="el_author_img"><img src="<?php the_field('img', $term); ?>" alt=""></div>
                    <?php endif;  ?>
                    <div class="el_author_name">
                        <span class="el_author_ttl">この記事の監修者</span>
                        <span class="el_author_nametxt">
                            <span class="el_author_job"><?php the_field('job', $term); ?></span>    
                            <span><?php echo $term->name; ?></span>
                        </span>
                    </div>
                </div>
                <?php if (get_field('text', $term)) : ?>
                <div class="el_author_text"><?php the_field('text', $term); ?></div>
                <?php endif; wp_reset_postdata();?>
            </li>
        <?php }
        echo '</ul>';
        }
        ?><!-- /著者 -->

        <div class="el_single_pager">
        <?php
        $prevpost = get_adjacent_post(false, '', true);
        $nextpost = get_adjacent_post(false, '', false);
        if ($prevpost or $nextpost) {
        ?>
            <div class="el_single_pager_item un_prev">
                <?php
                if ($prevpost) {
                    $prev_thumb_url = get_the_post_thumbnail_url($prevpost->ID, 'thumbnail');
                    if (!$prev_thumb_url) {
                        $prev_thumb_url = get_template_directory_uri() . '/assets/img/common/no-image.jpg';
                    } ?>
                    <a href="<?php echo get_permalink($prevpost->ID); ?>">
                        <p class="el_single_pager_text">PREV</p>
                        <div class="el_single_pager_post">
                            <figure class="el_single_pager_img"><img src="<?php echo esc_url($prev_thumb_url); ?>" alt=""></figure>
                            <p class="el_single_pager_ttl"><?php echo get_the_title($prevpost->ID); ?></p>
                        </div>
                    </a>
                <?php }
                ?>
            </div>
            <div class="el_single_pager_item un_next">
                <?php
                if ($nextpost) {
                    $next_thumb_url = get_the_post_thumbnail_url($nextpost->ID, 'thumbnail');
                    if (!$next_thumb_url) {
                        $next_thumb_url = get_template_directory_uri() . '/assets/img/common/no-image.jpg';
                    } ?>
                    <a href="<?php echo get_permalink($nextpost->ID); ?>">
                        <p class="el_single_pager_text">NEXT</p>
                        <div class="el_single_pager_post">
                            <figure class="el_single_pager_img"><img src="<?php echo esc_url($next_thumb_url); ?>" alt=""></figure>
                            <p class="el_single_pager_ttl"><?php echo get_the_title($nextpost->ID); ?></p>
                        </div>
                    </a>
                <?php }
                ?>
            </div>
        <?php } ?>
        </div><!-- /el_single_pager -->

        <a href="<?php echo home_url(); ?>/column/" class="el_btnNormal">一覧へ戻る</a>

    </div><!-- /el_columnPosts -->
    <div class="el_columnSide">
        <p class="el_columnSide_ttl">
            <span class="el_columnSide_ttl_en">THEME</span>
            <span class="el_columnSide_ttl_ja">テーマ</span>
        </p>
        <?php
        $displayed_posts = array();
        $columns = get_posts(array(
            'post_type' => 'column',
            'posts_per_page' => -1,
        ));
        if (!empty($columns)) {
            echo '<ul class="el_columnSide_theme">';
            foreach ($columns as $column) {
                $related_menus = get_field('menu_select', $column->ID);
                if (!empty($related_menus)) {
                    foreach ($related_menus as $menu) {
                        if (!in_array($menu->ID, $displayed_posts)) {
                            $displayed_posts[] = $menu->ID;
                            echo '<li><a href="' . home_url() . '/column/?s=&theme=' . $menu->ID . '">' . get_the_title($menu->ID) . '</a></li>';
                        }
                    }
                }
            }
            echo '</ul>';
        } wp_reset_postdata();
        ?>
        <p class="el_columnSide_ttl">
            <span class="el_columnSide_ttl_en">KEYWORD</span>
            <span class="el_columnSide_ttl_ja">キーワード</span>
        </p>
        <?php
        $terms = get_terms( array(
            'taxonomy' => 'column-key',
            'hide_empty' => true,
        ) );
        if ( !empty($terms) && !is_wp_error($terms) ) {
            echo '<ul class="el_columnSide_key">';
            foreach ( $terms as $term ) {
                echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a></li>';
            }
            echo '</ul>';
        } wp_reset_postdata();
        ?>

    </div><!-- /el_columnSide -->
</div><!-- /ly_2col -->

</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.13/clipboard.min.js"></script>
<script>
jQuery(function () {
var clipboard = new Clipboard('.js_shareurl');
clipboard.on('success', function(e) {
    alert('リンクがクリップボードにコピーされました');
    e.clearSelection();
});

clipboard.on('error', function(e) {
    alert('コピーに失敗しました。');
});
});
</script>

</body>
</html>
