<?php
$post_id = get_the_ID();
$args = array(
    'post_type' => 'price',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key' => 'menu_select',
            'value' => '"' . $post_id . '"',
            'compare' => 'LIKE',
        )
    ),
);
$query = new WP_Query($args);

// クリニックタームの取得
$priceClnincTermList = array();
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $terms = get_the_terms(get_the_ID(), 'clinic-cat');
        if (!is_wp_error($terms) && !empty($terms)) {
            $priceClnincTermList[] = $terms;
        }
    }
    wp_reset_postdata(); // ポストデータをリセット
}
$priceClnincTermList = array_merge(...array_merge($priceClnincTermList));
?>

<?php if (!empty($priceClnincTermList)) : ?>

    <div class="bl_menuPostPriceSec">

        <!-- クリニック切り替えメニュー -->
        <ul class="bl_priceListContainer_clinicBtnList">
            <?php if (!is_wp_error($priceClnincTermList)) : ?>
                <?php $i = 0; ?>
                <?php foreach ($priceClnincTermList as $priceClnincTerm) : ?>
                    <li class="bl_priceListContainer_clinicBtnList_item">
                        <button class="el_priceSec_seideMenuContainer_item_select_btn <?php echo ($i === 0) ? 'is-active' : ''; ?>"
                            id="<?php echo esc_attr($priceClnincTerm->slug); ?>"
                            type="button">
                            <?php echo esc_html($priceClnincTerm->name); ?>
                        </button>
                    </li>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>

        <?php if (!is_wp_error($priceClnincTermList)) : ?>
            <?php $i = 0; ?>
            <?php foreach ($priceClnincTermList as $priceClnincTerm) : ?>

                <div class="bl_priceListContainer <?php echo ($i === 0) ? 'is_priceListContainerActive' : ''; ?>"
                    data-clinic="<?php echo esc_attr($priceClnincTerm->slug); ?>">
                    <?php
                    $price_args = array(
                        'post_type' => 'price',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'clinic-cat',
                                'field'    => 'term_id',
                                'terms'    => $priceClnincTerm->term_id,
                            ),
                        ),
                        'meta_query' => array(
                            array(
                                'key' => 'menu_select',
                                'value' => '"' . $post_id . '"',
                                'compare' => 'LIKE',
                            )
                        ),
                    );
                    $pricePostQuery = new WP_Query($price_args);

                    ?>

                    <?php if ($pricePostQuery->have_posts()) : ?>
                        <ul class="bl_priceListContainer_priceList_largeList">

                            <?php while ($pricePostQuery->have_posts()) : $pricePostQuery->the_post(); ?>

                                <?php
                                $price_post_id = get_the_ID();
                                ?>

                                <li class="bl_priceListContainer_priceList_largeList_item">

                                    <?php if (have_rows('price_wrap', $price_post_id)) : ?>

                                        <ul class="bl_priceListContainer_priceList_smallList">

                                            <?php while (have_rows('price_wrap', $price_post_id)) : the_row(); ?>

                                                <li class="bl_priceListContainer_priceList_smallist_item">
                                                    <h3 class="el_priceListContainer_priceList_smallList_post_ttl">
                                                        <?php echo get_sub_field('left'); ?>
                                                    </h3>

                                                    <?php if (have_rows('price_table', get_the_ID())) : ?>
                                                        <ul class="bl_priceTableList">
                                                            <?php while (have_rows('price_table', get_the_ID())) : the_row(); ?>
                                                                <li class="bl_priceTableList_item">
                                                                    <div class="bl_priceTableList_item_innerContainer">
                                                                        <div class="bl_priceTableList_item_innerContainer_left">
                                                                            <?php if (get_sub_field('price_table-ttl')) : ?>
                                                                                <p class="el_priceTableList_item_innerContainer_left_txt">
                                                                                    <?php echo get_sub_field('price_table-ttl'); ?>
                                                                                </p>
                                                                            <?php endif; ?>
                                                                        </div>

                                                                        <div class="bl_priceTableList_item_innerContainer_right">
                                                                            <?php if (have_rows('amount-table', get_the_ID())) : ?>
                                                                                <?php while (have_rows('amount-table', get_the_ID())) : the_row(); ?>
                                                                                    <div class="bl_priceTableList_item_innerContainer_right_container">
                                                                                        <div class="bl_priceTableList_item_innerContainer_right_txtContainer">
                                                                                            <?php if (get_sub_field('amount-table_txt')) : ?>
                                                                                                <p><?php echo get_sub_field('amount-table_txt'); ?></p>
                                                                                            <?php endif; ?>
                                                                                        </div>

                                                                                        <div class="bl_priceTableList_item_innerContainer_right_container_table">
                                                                                            <div class="bl_priceTableList_item_innerContainer_right_txtContainer">
                                                                                                <?php if (get_sub_field('amount-table_view')) : ?>
                                                                                                    <p class="el_priceListContainer_item_innerContainer_right_txtContainer_view">
                                                                                                        <?php echo get_sub_field('amount-table_view'); ?>
                                                                                                    </p>
                                                                                                <?php endif; ?>
                                                                                            </div>

                                                                                            <div class="bl_priceTableList_item_innerContainer_right_txtContainer bl_priceTableList_item_innerContainer_right_txtContainer_num">
                                                                                                <?php if (get_sub_field('amount-table_num')) : ?>
                                                                                                    <p class="el_priceTableList_item_innerContainer_right_txt">
                                                                                                        <?php echo get_sub_field('amount-table_num'); ?>
                                                                                                    </p>
                                                                                                <?php endif; ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endwhile; ?>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            <?php endwhile; ?>
                                                        </ul>
                                                    <?php endif; ?>

                                                    <?php if (get_field('price-caption' ,$price_post_id)) : ?>
                                                        <p class="el_priceListContainer_priceList_smallList_post_caption">
                                                            <?php echo get_field('price-caption' ,$price_post_id); ?>
                                                        </p>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); // サブクエリのポストデータをリセット 
                    ?>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
<?php endif; ?>