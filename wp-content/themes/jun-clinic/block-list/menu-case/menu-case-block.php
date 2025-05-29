<?php
$case_post_id = get_the_ID();
var_dump($case_post_id);
$args = array(
    'post_type' => 'case',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key' => 'menu_select',
            'value' => '"' . $case_post_id . '"',
            'compare' => 'LIKE',
        )
    ),
);
$case_query = new WP_Query($args);
echo $case_query->found_posts;


if ($case_query->have_posts()) : ?>
    <div class="bl_menuCaseSec">
        <div class="splide bl_menuCaseSec_splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php while ($case_query->have_posts()) : $case_query->the_post(); ?>
                        <li class="splide__slide">
                            <a href="<?php the_permalink(); ?>" class="bl_caseList_item_btn">
                                <div class="bl_caseList_item_imgContainer">
                                    <?php if (have_rows('slide')): ?>
                                        <?php
                                        $i = 0;
                                        while (have_rows('slide')): the_row();
                                            if ($i === 0): ?>
                                                <img class="bl_caseList_item_imgContainer_img" src="<?php the_sub_field('img'); ?>" alt="<?php the_title(); ?>">
                                        <?php
                                            endif;
                                            $i++;
                                        endwhile;
                                        ?>
                                    <?php else: ?>
                                        <img class="bl_caseList_item_imgContainer_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/no-post.jpg" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </div>

                                <div class="bl_caseList_item_txtContainer">
                                    <div class="bl_bl_caseList_item_txtContainer_tagList">
                                        <?php
                                        $menu_select = get_field('menu_select');
                                        ?>

                                        <?php if (!empty($menu_select)) : ?>
                                            <?php foreach ($menu_select as $menu_selectPost) : ?>
                                                <p class="el_caseList_item_txtContainer_tagList_item">#<?php echo esc_html(get_the_title($menu_selectPost)); ?></p>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                    <p class="bl_caseList_item_txtContainer_ttl"><?php the_title(); ?></p>
                                </div>

                                <dl class="bl_caseList_item_caseInfo">
                                    <?php
                                    $caseInfoSlugList = ["case-price", "case-time", "case-downtime", "case-makeup", "case-risk"];
                                    foreach ($caseInfoSlugList as $caseInfoSlug):
                                        $field_object = get_field_object($caseInfoSlug, get_the_ID());
                                        $price = get_field($caseInfoSlug, get_the_ID());

                                        if ($price):
                                    ?>
                                            <div class="bl_caseList_item_caseInfo_item">
                                                <dt class="bl_caseList_item_caseInfo_item_dt">
                                                    <?php echo esc_html($field_object['label']); ?>
                                                </dt>
                                                <dd class="bl_caseList_item_caseInfo_item_dd">
                                                    <?php echo esc_html($price); ?>
                                                </dd>
                                            </div>
                                    <?php
                                        endif;
                                    endforeach;
                                    ?>
                                </dl>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>