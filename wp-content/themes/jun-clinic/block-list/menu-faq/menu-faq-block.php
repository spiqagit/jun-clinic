<div class="bl_menuFaqSec">
    <div class="bl_menuFaqSec_inner">
        <?php if( have_rows('menu-faqlist') ): ?>
        <ul class="bl_commonfaqList">
            <?php while( have_rows('menu-faqlist') ): the_row(); 
                $question = get_sub_field('menu-faqlist-ttl');
                $answer = get_sub_field('menu-faqlist-txt');
            ?>
                <li class="bl_commonfaqList_item">
                    <details class="bl_commonfaqList_item_details">
                        <summary class="bl_commonfaqList_item_details_summary">
                            <span class="el_commonfaqList_item_details_summary_q">Q</span>
                            <span class="el_commonfaqList_item_details_summary_ttl"><?php echo esc_html($question); ?></span>
                            <span class="el_commonfaqList_item_details_summary_icon"></span>
                        </summary>
                        <div class="bl_commonfaqList_item_details_panel">
                            <p class="bl_commonfaqList_item_details_panel_inner">
                                <?php echo wp_kses_post($answer); ?>
                            </p>
                        </div>
                    </details>
                </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>