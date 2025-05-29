<div class="bl_commonBreadcrumbContainer">
    <ul class="bl_commonBreadcrumbList">
        <li class="bl_commonBreadcrumbItem">
            <a href="<?php echo home_url(); ?>" class="el_commonBreadcrumbItem_link">トップ</a>
        </li>

        <li class="bl_commonBreadcrumbItem">
            <img class="el_commonBreadcrumbItem_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/bread-line.svg" alt="">
        </li>
        
        <!-- 料金表 -->
        <?php if (is_post_type_archive('price') || (is_tax('menu-cat') && get_post_type() === 'price')) : ?>
            <li class="bl_commonBreadcrumbItem">
                <span class="el_commonBreadcrumbItem_txt">料金表</span>
            </li>
        <?php endif; ?>

        <!-- 固定ページ -->
        <?php if (is_page('hada-care')  || is_page('cancel-policy')) : ?>
            <li class="bl_commonBreadcrumbItem">
                <span class="el_commonBreadcrumbItem_txt"><?php the_title(); ?></span>
            </li>
        <?php endif; ?>
    </ul>
</div>