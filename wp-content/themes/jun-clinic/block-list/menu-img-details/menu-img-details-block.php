<div class="bl_menuFaqSec bl_menuImgDetailsSec">
    <div class="bl_menuFaqSec_inner">
        <?php if (have_rows('menu-img-details')): ?>
            <ul class="bl_commonfaqList bl_immgDetailsList">
                <?php while (have_rows('menu-img-details')): the_row();
                    $ttl = get_sub_field('menu-img-details-ttl');
                    $item = get_sub_field('menu-img-details-txt');
                    $img = get_sub_field('menu-img-details-img');
                ?>
                    <li class="bl_commonfaqList_item">
                        <details class="bl_commonfaqList_item_details">
                            <summary class="bl_commonfaqList_item_details_summary">
                                <span class="el_commonfaqList_item_details_summary_ttl"><?php echo esc_html($ttl); ?></span>
                                <span class="el_commonfaqList_item_details_summary_icon"></span>
                            </summary>
                            <div class="bl_commonfaqList_item_details_panel">
                                <div class="bl_commonfaqList_item_details_panel_inner">
                                    <?php if ($img): ?>
                                        <div class="bl_commonfaqList_item_details_panel_imgBlock">
                                            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($ttl); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($item): ?>
                                        <div class="bl_commonfaqList_item_details_panel_txtBlock">
                                            <?php echo $item; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </details>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>