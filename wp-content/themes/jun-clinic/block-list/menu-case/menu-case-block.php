<?php
$case_post_id = get_the_ID();
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
                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" fill="none">
                            <path d="M6.30371 0.706975C6.01082 0.414081 5.53508 0.414081 5.24219 0.706975L0.469727 5.48041C0.176833 5.77331 0.176833 6.24807 0.469727 6.54096L5.24219 11.3144C5.53508 11.6073 6.01082 11.6073 6.30371 11.3144C6.5966 11.0215 6.5966 10.5458 6.30371 10.2529L2.81055 6.76069H17C17.4142 6.76069 17.75 6.4249 17.75 6.01069C17.75 5.59647 17.4142 5.26069 17 5.26069H2.81055L6.30371 1.7685C6.5966 1.4756 6.5966 0.999868 6.30371 0.706975Z" fill="white"></path>
                        </svg>
                    </button>
                    <div class="splide__pagination"></div>
                    <button class="splide__arrow splide__arrow--next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" fill="none">
                            <path d="M11.6963 0.706975C11.9892 0.414081 12.4649 0.414081 12.7578 0.706975L17.5303 5.48041C17.8232 5.77331 17.8232 6.24807 17.5303 6.54096L12.7578 11.3144C12.4649 11.6073 11.9892 11.6073 11.6963 11.3144C11.4034 11.0215 11.4034 10.5458 11.6963 10.2529L15.1895 6.76069H1C0.585786 6.76069 0.25 6.4249 0.25 6.01069C0.25 5.59647 0.585786 5.26069 1 5.26069H15.1895L11.6963 1.7685C11.4034 1.4756 11.4034 0.999868 11.6963 0.706975Z" fill="white"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>