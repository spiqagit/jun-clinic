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

        <!-- 料金表 -->
        <?php if (is_singular('menu')) : ?>
            <li class="bl_commonBreadcrumbItem">
                <span class="el_commonBreadcrumbItem_txt"><?php the_title(); ?></span>
            </li>
        <?php endif; ?>

        <!-- 医師紹介 -->
        <?php if (is_post_type_archive('doctor')): ?>
            <li class="bl_commonBreadcrumbItem">
                <span class="el_commonBreadcrumbItem_txt">ドクター一覧</span>
            </li>
        <?php endif; ?>

        <!-- 医師紹介詳細 -->
        <?php if (is_singular('doctor')) : ?>
            <li class="bl_commonBreadcrumbItem">
                <a href="<?php echo get_post_type_archive_link('doctor'); ?>" class="el_commonBreadcrumbItem_link">ドクター一覧</a>
            </li>
            <li class="bl_commonBreadcrumbItem">
                <img class="el_commonBreadcrumbItem_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/bread-line.svg" alt="">
            </li>
            <li class="bl_commonBreadcrumbItem">
                <span class="el_commonBreadcrumbItem_txt"><?php echo get_the_title(); ?></span>
            </li>
        <?php endif; ?>

        <!-- クリニック紹介詳細 -->
        <?php if (is_singular('clinic')) : ?>
            <!-- 一覧ページないため一旦非表示 -->
            <!-- <li class="bl_commonBreadcrumbItem">
                <a href="<?php echo get_post_type_archive_link('clinic'); ?>" class="el_commonBreadcrumbItem_link">クリニック一覧</a>
            </li>
            <li class="bl_commonBreadcrumbItem">
                <img class="el_commonBreadcrumbItem_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/bread-line.svg" alt="">
            </li> -->
            <li class="bl_commonBreadcrumbItem">
                <span class="el_commonBreadcrumbItem_txt"><?php the_title(); ?></span>
            </li>
        <?php endif; ?>


        <!-- 固定ページ -->
        <?php if (is_page('skin-care-policy')  || is_page('cancel-policy')) : ?>
            <li class="bl_commonBreadcrumbItem">
                <span class="el_commonBreadcrumbItem_txt"><?php the_title(); ?></span>
            </li>
        <?php endif; ?>

        <!-- 404 -->
        <?php if (is_404()) : ?>
            <li class="bl_commonBreadcrumbItem">
                <span class="el_commonBreadcrumbItem_txt">ページが見つかりません</span>
            </li>
        <?php endif; ?>
    </ul>
</div>