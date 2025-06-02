<!--  予約ボタン -->
<div class="bl_footerReserveSec">
    <div class="bl_footer_reserveContainer">
        <div class="bl_footer_reserveContainer_inner">
            <hgroup class="bl_footer_reserveContainer_ttlContainer">
                <p class="el_footer_reserveContainer_ttl_sub">Reserve</p>
                <h2 class="el_footer_reserveContainer_ttl">ご予約はこちら</h2>
            </hgroup>
            <div class="bl_footer_reserveContainer_btnContainer">
                <button type="button" class="el_footer_reserveContainer_btn" id="footerLineReserveBtn">LINE予約</button>

                <div class="bl_lineReserveModal bl_footer_lineReserve_modal" id="footerLineReserveModal">
                    <div class="bl_lineReserveModal_inner">
                        <button type="button" class="el_lineReserveModal_inner_closeBtn">
                            <img class="el_lineReserveModal_inner_closeBtn_icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/close-icon.svg" alt="">
                        </button>
                        <p class="el_lineReserveModal_inner_title">予約する</p>
                        <?php

                        $arg = array(
                            'post_type' => 'clinic',
                            'posts_per_page' => -1,
                        );
                        $query = new WP_Query($arg);
                        ?>
                        <?php if ($query->have_posts()) : ?>
                            <ul class="bl_lineReserveModal_inner_list">
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <li class="bl_lineReserveModal_inner_list_item">
                                        <a href="<?php the_field('line_reserveUrl'); ?>" target="_blank" class="bl_lineReserveModal_inner_list_item_link">
                                            <p class="el_lineReserveModal_inner_list_item_link_txt"><?php echo get_term(get_field('news_topics_place'), 'clinic-cat')->name; ?></p>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" alt="">
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- クリニック案内 -->
<div class="ly_footerBg">
    <section class="ly_commonContantsOuter ly_footerClinicSec">
        <div class="ly_commonContantsOuter_inner">
            <div class="bl_footerClinicSec_ttlContainer">
                <hgroup class="bl_commonSectionTtl bl_topFeatureSec_ttl">
                    <p class="el_commonSectionTtl_ttl">Clinic Information</p>
                    <h2 class="el_commonSectionTtl_ttl_ttl">クリニック案内</h2>
                </hgroup>
            </div>

            <?php
            $args = array(
                'post_type' => 'clinic',
                'posts_per_page' => -1
            );
            $clinic_query = new WP_Query($args); ?>

            <?php if ($clinic_query->have_posts()) : ?>
                <ul class="bl_clinicList">

                    <?php while ($clinic_query->have_posts()) : $clinic_query->the_post(); ?>
                        <li class="bl_clinicList_item">
                            <div class="bl_clinicList_item_upper">
                                <p class="bl_clinicList_item_ttl"><?php the_title(); ?></p>
                                <div class="bl_clinicSnsContainer">
                                    <?php if (get_field('instagram_url')) : ?>
                                        <a href="<?php echo get_field('instagram_url'); ?>" class="bl_clinicSnsContainer_btn" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                                <g clip-path="url(#clip0_5374_4113)">
                                                    <path d="M5.27258 0.0746626C4.31498 0.119843 3.66103 0.272663 3.08935 0.497303C2.49769 0.727883 1.99621 1.0373 1.49725 1.53806C0.998295 2.03882 0.691035 2.54066 0.462075 3.13322C0.240495 3.70616 0.0903746 4.36064 0.0480746 5.31878C0.0057746 6.27692 -0.00358541 6.5849 0.00109459 9.02894C0.00577459 11.473 0.0165746 11.7793 0.0630146 12.7395C0.108735 13.6969 0.261015 14.3506 0.485655 14.9225C0.716595 15.5142 1.02565 16.0155 1.52659 16.5146C2.02753 17.0137 2.52901 17.3203 3.12301 17.5496C3.69541 17.7708 4.35008 17.9217 5.30804 17.9636C6.266 18.0055 6.57434 18.0153 9.01766 18.0106C11.461 18.0059 11.7686 17.9951 12.7285 17.9496C13.6885 17.904 14.3388 17.7507 14.9109 17.5271C15.5025 17.2956 16.0042 16.9871 16.503 16.486C17.0017 15.9849 17.3088 15.4827 17.5376 14.8897C17.7594 14.3173 17.91 13.6627 17.9516 12.7054C17.9935 11.7448 18.0034 11.4381 17.9988 8.99438C17.9941 6.5507 17.9831 6.24434 17.9376 5.28458C17.892 4.32482 17.7396 3.67304 17.5151 3.10082C17.2838 2.50916 16.9751 2.00822 16.4743 1.50872C15.9736 1.00922 15.471 0.702323 14.8783 0.474083C14.3055 0.252503 13.6512 0.101483 12.6933 0.0600826C11.7353 0.0186826 11.427 0.0080626 8.98274 0.0127426C6.53852 0.0174226 6.23252 0.0278626 5.27258 0.0746626ZM5.3777 16.3445C4.5002 16.3063 4.02373 16.1605 3.70621 16.0385C3.28573 15.8765 2.98621 15.6807 2.66977 15.3673C2.35333 15.0539 2.15893 14.7533 1.99477 14.3337C1.87147 14.0162 1.72297 13.5403 1.68193 12.6628C1.63729 11.7144 1.62793 11.4296 1.62271 9.02678C1.61749 6.62396 1.62667 6.33956 1.66825 5.39078C1.70569 4.514 1.85239 4.037 1.97425 3.71966C2.13625 3.29864 2.33137 2.99966 2.64547 2.6834C2.95957 2.36714 3.25927 2.17238 3.67921 2.00822C3.99637 1.88438 4.4723 1.73714 5.34944 1.69538C6.29858 1.65038 6.58298 1.64138 8.98544 1.63616C11.3879 1.63094 11.673 1.63994 12.6225 1.6817C13.4993 1.71986 13.9765 1.86512 14.2935 1.9877C14.7141 2.1497 15.0135 2.34428 15.3297 2.65892C15.646 2.97356 15.8409 3.27218 16.0051 3.69302C16.1291 4.00928 16.2763 4.48502 16.3177 5.3627C16.3629 6.31184 16.3732 6.59642 16.3775 8.9987C16.3818 11.401 16.3734 11.6863 16.3318 12.6347C16.2934 13.5122 16.148 13.9888 16.0258 14.3067C15.8638 14.727 15.6685 15.0267 15.3542 15.3428C15.0399 15.6589 14.7406 15.8536 14.3205 16.0178C14.0037 16.1415 13.5272 16.2891 12.6508 16.3308C11.7016 16.3755 11.4172 16.3848 9.01388 16.39C6.61052 16.3953 6.32701 16.3855 5.37787 16.3445M12.7147 4.20152C12.715 4.41514 12.7787 4.62386 12.8977 4.80127C13.0167 4.97869 13.1856 5.11683 13.3831 5.19823C13.5806 5.27964 13.7978 5.30064 14.0073 5.25859C14.2167 5.21654 14.409 5.11332 14.5597 4.96199C14.7105 4.81067 14.813 4.61802 14.8543 4.40843C14.8956 4.19884 14.8738 3.98171 14.7917 3.78451C14.7095 3.58731 14.5708 3.41889 14.3929 3.30056C14.2151 3.18223 14.0061 3.1193 13.7925 3.11972C13.5061 3.1203 13.2317 3.23458 13.0296 3.43745C12.8275 3.64031 12.7142 3.91515 12.7147 4.20152ZM4.37887 9.02066C4.38391 11.5731 6.4568 13.6375 9.00866 13.6326C11.5605 13.6278 13.6264 11.5551 13.6215 9.00266C13.6167 6.45026 11.5432 4.3853 8.99102 4.39034C6.4388 4.39538 4.37401 6.46862 4.37887 9.02066ZM5.99996 9.01742C5.99878 8.42407 6.17358 7.84369 6.50226 7.34968C6.83093 6.85568 7.29871 6.47022 7.84645 6.24207C8.39419 6.01392 8.99728 5.95332 9.57947 6.06792C10.1616 6.18253 10.6968 6.4672 11.1172 6.88593C11.5376 7.30466 11.8243 7.83866 11.9413 8.42038C12.0582 9.0021 12 9.60543 11.774 10.1541C11.548 10.7027 11.1644 11.172 10.6717 11.5026C10.179 11.8333 9.59931 12.0104 9.00595 12.0115C8.61197 12.0124 8.22168 11.9356 7.85737 11.7855C7.49307 11.6355 7.16189 11.4152 6.88275 11.1372C6.6036 10.8591 6.38197 10.5288 6.2305 10.1651C6.07903 9.80139 6.00069 9.41141 5.99996 9.01742Z" fill="#333333" />
                                                </g>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (get_field('tiktok_url')) : ?>
                                        <a href="<?php echo get_field('tiktok_url'); ?>" class="bl_clinicSnsContainer_btn" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                                <g clip-path="url(#clip0_5374_4116)">
                                                    <path d="M9.39829 0.0269063C10.3799 0.0117188 11.3558 0.0207188 12.3306 0.0117188C12.3897 1.15978 12.8025 2.32922 13.6429 3.14091C14.4816 3.97284 15.6679 4.35366 16.8222 4.48247V7.50253C15.7405 7.46709 14.6537 7.24209 13.6722 6.77634C13.2447 6.58284 12.8464 6.33366 12.4566 6.07884C12.4515 8.27034 12.4656 10.459 12.4425 12.6415C12.384 13.69 12.0381 14.7335 11.4284 15.5975C10.4474 17.0358 8.74467 17.9735 6.99586 18.0027C5.92317 18.064 4.85161 17.7715 3.93754 17.2327C2.42273 16.3394 1.35679 14.7042 1.20154 12.9492C1.18354 12.574 1.17736 12.1994 1.19254 11.8332C1.32754 10.4062 2.03348 9.04097 3.12923 8.11228C4.37123 7.03059 6.11104 6.51534 7.74004 6.82022C7.75523 7.93116 7.71079 9.04097 7.71079 10.1519C6.96661 9.91116 6.09698 9.97866 5.44673 10.4303C4.97198 10.738 4.61142 11.2094 4.42354 11.7427C4.26829 12.1229 4.31273 12.5453 4.32173 12.9492C4.50004 14.18 5.68354 15.2144 6.94692 15.1025C7.78448 15.0935 8.58717 14.6075 9.02367 13.8959C9.16485 13.6467 9.32292 13.3919 9.33136 13.0988C9.40504 11.7573 9.37579 10.4213 9.38479 9.07978C9.39098 6.05634 9.37579 3.04134 9.39885 0.0274688L9.39829 0.0269063Z" fill="#333333" />
                                                </g>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (get_field('youtube_url')) : ?>
                                        <a href="<?php echo get_field('youtube_url'); ?>" class="bl_clinicSnsContainer_btn" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none">
                                                <path d="M17.6236 2.63527C17.417 1.85596 16.8065 1.24232 16.0323 1.03368C14.6291 0.655273 9 0.655273 9 0.655273C9 0.655273 3.37091 0.655273 1.96773 1.03368C1.19352 1.24232 0.582955 1.85596 0.376364 2.63527C0 4.04868 0 6.99618 0 6.99618C0 6.99618 0 9.94368 0.376364 11.3571C0.582955 12.1364 1.19352 12.75 1.96773 12.9587C3.37193 13.3371 9 13.3371 9 13.3371C9 13.3371 14.6291 13.3371 16.0323 12.9587C16.8065 12.75 17.417 12.1364 17.6236 11.3571C18 9.94471 18 6.99618 18 6.99618C18 6.99618 18 4.04868 17.6236 2.63527ZM7.15909 9.67266V4.31971L11.8636 6.99618L7.15909 9.67266Z" fill="#333333" />
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="bl_clinicList_item_lower">
                                <div class="bl_clinicList_item_lower_sp">
                                    <div class="bl_clinicList_item_imgContainer">
                                        <?php if (get_the_post_thumbnail()) : ?>
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/no-post.jpg" alt="<?php the_title(); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="bl_clinicList_item_lower_sp_right">
                                        <p class="bl_clinicList_item_ttl"><?php the_title(); ?></p>
                                        <div class="bl_clinicSnsContainer">
                                            <?php if (get_field('instagram_url')) : ?>
                                                <a href="<?php echo get_field('instagram_url'); ?>" class="bl_clinicSnsContainer_btn" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                                        <g clip-path="url(#clip0_5374_4113)">
                                                            <path d="M5.27258 0.0746626C4.31498 0.119843 3.66103 0.272663 3.08935 0.497303C2.49769 0.727883 1.99621 1.0373 1.49725 1.53806C0.998295 2.03882 0.691035 2.54066 0.462075 3.13322C0.240495 3.70616 0.0903746 4.36064 0.0480746 5.31878C0.0057746 6.27692 -0.00358541 6.5849 0.00109459 9.02894C0.00577459 11.473 0.0165746 11.7793 0.0630146 12.7395C0.108735 13.6969 0.261015 14.3506 0.485655 14.9225C0.716595 15.5142 1.02565 16.0155 1.52659 16.5146C2.02753 17.0137 2.52901 17.3203 3.12301 17.5496C3.69541 17.7708 4.35008 17.9217 5.30804 17.9636C6.266 18.0055 6.57434 18.0153 9.01766 18.0106C11.461 18.0059 11.7686 17.9951 12.7285 17.9496C13.6885 17.904 14.3388 17.7507 14.9109 17.5271C15.5025 17.2956 16.0042 16.9871 16.503 16.486C17.0017 15.9849 17.3088 15.4827 17.5376 14.8897C17.7594 14.3173 17.91 13.6627 17.9516 12.7054C17.9935 11.7448 18.0034 11.4381 17.9988 8.99438C17.9941 6.5507 17.9831 6.24434 17.9376 5.28458C17.892 4.32482 17.7396 3.67304 17.5151 3.10082C17.2838 2.50916 16.9751 2.00822 16.4743 1.50872C15.9736 1.00922 15.471 0.702323 14.8783 0.474083C14.3055 0.252503 13.6512 0.101483 12.6933 0.0600826C11.7353 0.0186826 11.427 0.0080626 8.98274 0.0127426C6.53852 0.0174226 6.23252 0.0278626 5.27258 0.0746626ZM5.3777 16.3445C4.5002 16.3063 4.02373 16.1605 3.70621 16.0385C3.28573 15.8765 2.98621 15.6807 2.66977 15.3673C2.35333 15.0539 2.15893 14.7533 1.99477 14.3337C1.87147 14.0162 1.72297 13.5403 1.68193 12.6628C1.63729 11.7144 1.62793 11.4296 1.62271 9.02678C1.61749 6.62396 1.62667 6.33956 1.66825 5.39078C1.70569 4.514 1.85239 4.037 1.97425 3.71966C2.13625 3.29864 2.33137 2.99966 2.64547 2.6834C2.95957 2.36714 3.25927 2.17238 3.67921 2.00822C3.99637 1.88438 4.4723 1.73714 5.34944 1.69538C6.29858 1.65038 6.58298 1.64138 8.98544 1.63616C11.3879 1.63094 11.673 1.63994 12.6225 1.6817C13.4993 1.71986 13.9765 1.86512 14.2935 1.9877C14.7141 2.1497 15.0135 2.34428 15.3297 2.65892C15.646 2.97356 15.8409 3.27218 16.0051 3.69302C16.1291 4.00928 16.2763 4.48502 16.3177 5.3627C16.3629 6.31184 16.3732 6.59642 16.3775 8.9987C16.3818 11.401 16.3734 11.6863 16.3318 12.6347C16.2934 13.5122 16.148 13.9888 16.0258 14.3067C15.8638 14.727 15.6685 15.0267 15.3542 15.3428C15.0399 15.6589 14.7406 15.8536 14.3205 16.0178C14.0037 16.1415 13.5272 16.2891 12.6508 16.3308C11.7016 16.3755 11.4172 16.3848 9.01388 16.39C6.61052 16.3953 6.32701 16.3855 5.37787 16.3445M12.7147 4.20152C12.715 4.41514 12.7787 4.62386 12.8977 4.80127C13.0167 4.97869 13.1856 5.11683 13.3831 5.19823C13.5806 5.27964 13.7978 5.30064 14.0073 5.25859C14.2167 5.21654 14.409 5.11332 14.5597 4.96199C14.7105 4.81067 14.813 4.61802 14.8543 4.40843C14.8956 4.19884 14.8738 3.98171 14.7917 3.78451C14.7095 3.58731 14.5708 3.41889 14.3929 3.30056C14.2151 3.18223 14.0061 3.1193 13.7925 3.11972C13.5061 3.1203 13.2317 3.23458 13.0296 3.43745C12.8275 3.64031 12.7142 3.91515 12.7147 4.20152ZM4.37887 9.02066C4.38391 11.5731 6.4568 13.6375 9.00866 13.6326C11.5605 13.6278 13.6264 11.5551 13.6215 9.00266C13.6167 6.45026 11.5432 4.3853 8.99102 4.39034C6.4388 4.39538 4.37401 6.46862 4.37887 9.02066ZM5.99996 9.01742C5.99878 8.42407 6.17358 7.84369 6.50226 7.34968C6.83093 6.85568 7.29871 6.47022 7.84645 6.24207C8.39419 6.01392 8.99728 5.95332 9.57947 6.06792C10.1616 6.18253 10.6968 6.4672 11.1172 6.88593C11.5376 7.30466 11.8243 7.83866 11.9413 8.42038C12.0582 9.0021 12 9.60543 11.774 10.1541C11.548 10.7027 11.1644 11.172 10.6717 11.5026C10.179 11.8333 9.59931 12.0104 9.00595 12.0115C8.61197 12.0124 8.22168 11.9356 7.85737 11.7855C7.49307 11.6355 7.16189 11.4152 6.88275 11.1372C6.6036 10.8591 6.38197 10.5288 6.2305 10.1651C6.07903 9.80139 6.00069 9.41141 5.99996 9.01742Z" fill="#333333" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                            <?php if (get_field('tiktok_url')) : ?>
                                                <a href="<?php echo get_field('tiktok_url'); ?>" class="bl_clinicSnsContainer_btn" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                                        <g clip-path="url(#clip0_5374_4116)">
                                                            <path d="M9.39829 0.0269063C10.3799 0.0117188 11.3558 0.0207188 12.3306 0.0117188C12.3897 1.15978 12.8025 2.32922 13.6429 3.14091C14.4816 3.97284 15.6679 4.35366 16.8222 4.48247V7.50253C15.7405 7.46709 14.6537 7.24209 13.6722 6.77634C13.2447 6.58284 12.8464 6.33366 12.4566 6.07884C12.4515 8.27034 12.4656 10.459 12.4425 12.6415C12.384 13.69 12.0381 14.7335 11.4284 15.5975C10.4474 17.0358 8.74467 17.9735 6.99586 18.0027C5.92317 18.064 4.85161 17.7715 3.93754 17.2327C2.42273 16.3394 1.35679 14.7042 1.20154 12.9492C1.18354 12.574 1.17736 12.1994 1.19254 11.8332C1.32754 10.4062 2.03348 9.04097 3.12923 8.11228C4.37123 7.03059 6.11104 6.51534 7.74004 6.82022C7.75523 7.93116 7.71079 9.04097 7.71079 10.1519C6.96661 9.91116 6.09698 9.97866 5.44673 10.4303C4.97198 10.738 4.61142 11.2094 4.42354 11.7427C4.26829 12.1229 4.31273 12.5453 4.32173 12.9492C4.50004 14.18 5.68354 15.2144 6.94692 15.1025C7.78448 15.0935 8.58717 14.6075 9.02367 13.8959C9.16485 13.6467 9.32292 13.3919 9.33136 13.0988C9.40504 11.7573 9.37579 10.4213 9.38479 9.07978C9.39098 6.05634 9.37579 3.04134 9.39885 0.0274688L9.39829 0.0269063Z" fill="#333333" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                            <?php if (get_field('youtube_url')) : ?>
                                                <a href="<?php echo get_field('youtube_url'); ?>" class="bl_clinicSnsContainer_btn" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none">
                                                        <path d="M17.6236 2.63527C17.417 1.85596 16.8065 1.24232 16.0323 1.03368C14.6291 0.655273 9 0.655273 9 0.655273C9 0.655273 3.37091 0.655273 1.96773 1.03368C1.19352 1.24232 0.582955 1.85596 0.376364 2.63527C0 4.04868 0 6.99618 0 6.99618C0 6.99618 0 9.94368 0.376364 11.3571C0.582955 12.1364 1.19352 12.75 1.96773 12.9587C3.37193 13.3371 9 13.3371 9 13.3371C9 13.3371 14.6291 13.3371 16.0323 12.9587C16.8065 12.75 17.417 12.1364 17.6236 11.3571C18 9.94471 18 6.99618 18 6.99618C18 6.99618 18 4.04868 17.6236 2.63527ZM7.15909 9.67266V4.31971L11.8636 6.99618L7.15909 9.67266Z" fill="#333333" />
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="bl_clinicList_item_infoContainer">

                                        <?php if (get_field('address')) : ?>
                                            <div class="bl_clinicList_item_infoContainer_item">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pin-icon.svg" class="el_clinicList_item_infoContainer_item_icon" alt="">
                                                <div class="bl_clinicList_item_infoContainer_item_content">
                                                    <p class="el_clinicList_item_infoContainer_item_txt"><?php echo get_field('address'); ?></p>
                                                    <?php if (get_field('google_map')) : ?>
                                                        <a href="<?php echo get_field('google_map'); ?>" class="bl_clinicList_item_infoContainer_item_link" target="_blank">
                                                            <p class="el_clinicList_item_infoContainer_item_link_txt">Google Maps</p>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tab-icon.svg" class="el_clinicList_item_infoContainer_item_link_icon" alt="Google Maps">
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (get_field('access')) : ?>
                                            <div class="bl_clinicList_item_infoContainer_item">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/train-icon.svg" class="el_clinicList_item_infoContainer_item_icon" alt="">
                                                <div class="bl_clinicList_item_infoContainer_item_content">
                                                    <p class="el_clinicList_item_infoContainer_item_txt"><?php echo get_field('access'); ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (get_field('tell')) : ?>
                                            <div class="bl_clinicList_item_infoContainer_item">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/tel-icon.svg" class="el_clinicList_item_infoContainer_item_icon" alt="">
                                                <div class="bl_clinicList_item_infoContainer_item_content">
                                                    <a href="tel:<?php echo get_field('tell'); ?>" class="el_clinicList_item_infoContainer_item_txt el_clinicList_item_infoContainer_item_tell"><?php echo get_field('tell'); ?></a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="bl_clinicList_item_link">
                                        <p class="el_clinicList_item_link_txt">詳しく見る</p>
                                        <div class="el_clinicList_item_link_icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8" fill="none">
                                                <path d="M7.46484 0.464806C7.66011 0.269544 7.97661 0.269544 8.17188 0.464806L11.3535 3.64645C11.5488 3.84171 11.5488 4.15822 11.3535 4.35348L8.17188 7.53512C7.97661 7.73038 7.66011 7.73038 7.46484 7.53512C7.26958 7.33986 7.26958 7.02335 7.46484 6.82809L9.79297 4.49996H1C0.723858 4.49996 0.5 4.2761 0.5 3.99996C0.5 3.72382 0.723858 3.49996 1 3.49996H9.79297L7.46484 1.17184C7.26958 0.976575 7.26958 0.660068 7.46484 0.464806Z" fill="white" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>

                </ul>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>

    <div class="ly_footerBg_inner">
        <picture class="ly_commonContantsBgItemContainer_item">
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/footer-wave-sp.png" media="(max-width: 768px)">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/footer-wave.png" alt="">
        </picture>
        <footer class="ly_footer">
            <div class="ly_footer_upper">
                <div class="ly_footer_upper_inner">
                    <div class="bl_header_nav_inner_menu">
                        <!-- お悩みから探す -->
                        <div class="bl_header_nav_inner_menu_conatainer">
                            <div class="bl_header_nav_inner_menu_conatainer_titleWrapper">
                                <p class="bl_header_nav_inner_menu_conatainer_title">お悩みから探す</p>
                            </div>
                            <div class="bl_header_nav_inner_menu_conatainer_listWrapper">
                                <?php
                                $problemFlag = false;
                                if ($problemFlag) :
                                ?>
                                    <ul class="bl_globalMenuList">
                                        <?php
                                        $terms = get_terms(array(
                                            'taxonomy' => 'menu-problem',
                                            'hide_empty' => true,
                                        ));
                                        if (!empty($terms) && !is_wp_error($terms)) :
                                            foreach ($terms as $term) : ?>
                                                <li class="bl_globalMenuList_item">
                                                    <a class="bl_globalMenuList_item_link" href="<?php echo esc_url(get_term_link($term)); ?>">
                                                        <p class="el_globalMenuList_item_link_text"><?php echo esc_html($term->name); ?></p>
                                                    </a>
                                                </li>
                                        <?php endforeach;
                                        endif; ?>
                                    </ul>
                                <?php else: ?>
                                    <div class="bl_commonComingSoonTxtContainer">
                                        <p class="el_commonComingSoonTxt">coming soon</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php
                        $menuCatList = get_terms(array(
                            'taxonomy' => 'menu-cat',
                            'parent' => 0,  // 親カテゴリーのみ
                            'hide_empty' => true  // 投稿がないものは除外
                        ));
                        $termList = array();

                        foreach ($menuCatList as $menuCat) {

                            $posts = get_posts(array(
                                'post_type' => 'menu',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'menu-cat',
                                        'field' => 'term_id',
                                        'terms' => $menuCat->term_id
                                    )
                                )
                            ));

                            if (!empty($posts)) {
                                $termList[] = $menuCat;
                            }
                        }
                        ?>

                        <?php foreach ($termList as $term): ?>

                            <div class="bl_header_nav_inner_menu_conatainer">
                                <div class="bl_header_nav_inner_menu_conatainer_titleWrapper">
                                    <p class="bl_header_nav_inner_menu_conatainer_title"><?php echo $term->name; ?></p>
                                </div>
                                <div class="bl_header_nav_inner_menu_conatainer_listWrapper">
                                    <?php
                                    // サブクエリで記事を取得
                                    $args = array(
                                        'post_type' => 'menu',
                                        'posts_per_page' => -1,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'menu-cat',
                                                'field' => 'term_id',
                                                'terms' => $term->term_id
                                            )
                                        ),
                                        'orderby' => 'menu_order',
                                        'order' => 'ASC'
                                    );

                                    $sub_query = new WP_Query($args);
                                    ?>
                                    <?php if ($sub_query->have_posts()) : ?>
                                        <ul class="bl_globalMenuList">

                                            <?php while ($sub_query->have_posts()) : $sub_query->the_post(); ?>
                                                <li class="bl_globalMenuList_item">
                                                    <a class="bl_globalMenuList_item_link" href="<?php the_permalink(); ?>">
                                                        <p class="el_globalMenuList_item_link_text"><?php the_title(); ?></p>
                                                    </a>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <?php wp_reset_postdata(); ?>

                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="ly_footer_lower">
                <div class="ly_footer_lower_inner">
                    <div class="bl_footerGlobalNavi">
                        <a href="<?php echo home_url(); ?>" class="bl_footerGlobalNavi_logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/jun-clinic-white.svg" alt="JUN CLINIC">
                        </a>
                        <ul class="bl_footerGlobalNavi_list">
                            <li class="bl_footerGlobalNavi_list_item">
                                <a href="<?php echo home_url(); ?>" class="bl_footerGlobalNavi_list_item_link">
                                    <p class="el_footer_lower_inner_link_txt">トップ</p>
                                </a>
                            </li>
                            <li class="bl_footerGlobalNavi_list_item">
                                <a href="<?php echo home_url('/price/'); ?>" class="bl_footerGlobalNavi_list_item_link">
                                    <p class="el_footer_lower_inner_link_txt">料金表</p>
                                </a>
                            </li>
                            <li class="bl_footerGlobalNavi_list_item">
                                <a href="<?php echo home_url('/doctor/'); ?>" class="bl_footerGlobalNavi_list_item_link">
                                    <p class="el_footer_lower_inner_link_txt">ドクター一覧</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="bl_footerGlobalNavi_copyContainer">
                        <div class="bl_footerGlobalNavi_copyContainer_list">
                            <a href="<?php echo home_url('/skin-care-pilcy/'); ?>" class="bl_footerGlobalNavi_copyContainer_list_item">当院の肌治療・肌診断について</a>
                            <a href="<?php echo home_url('/cancel-policy/'); ?>" class="bl_footerGlobalNavi_copyContainer_list_item">予約・キャンセル・お子様の同伴について</a>
                            <a href="#" style="display: none;" class="bl_footerGlobalNavi_copyContainer_list_item">プライバシーポリシー</a>
                        </div>
                        <p class="el_footerGlobalNavi_copyright_txt">&copy; 2025 JUN CLINIC</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>