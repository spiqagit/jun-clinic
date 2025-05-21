<ul class="el_snsList">
    <?php if(get_field('sns_ig', 'option')):?>
        <li><a href="<?php echo get_field('sns_ig', 'option'); ?>" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/ico_Instagram.svg" alt="Instagram">
        </a></li>
    <?php endif; ?>
    <?php if(get_field('sns_youtube', 'option')):?>
        <li><a href="<?php echo get_field('sns_youtube', 'option'); ?>" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/ico_YouTube.svg" alt="Youtube">
        </a></li>
    <?php endif; ?>
    <?php if(get_field('sns_tiktok', 'option')):?>
        <li><a href="<?php echo get_field('sns_tiktok', 'option'); ?>" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/ico_TikTok.svg" alt="TikTok">
        </a></li>
    <?php endif; ?>
</ul>