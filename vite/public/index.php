<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>

<body class="pg_top ">
    <div class="bl_commonBgContainer">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/bg.png" alt="">
    </div>
    <?php get_header(); ?>
    <main class="ly_main ly_overBg">
        <!-- FV Slide -->
        <div class="bl_fvSlideContainer">
            <div class="splide fvSlide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php if (have_rows('fvSlideImg-list', 'option')): ?>
                            <?php while (have_rows('fvSlideImg-list', 'option')): the_row(); ?>
                                <?php
                                $fvSlideImg = get_sub_field('fvSlideImg-list-img');
                                ?>
                                <li class="splide__slide">
                                    <div class="bl_fvSlideBanner">
                                        <div class="bl_fvSlideBanner_imgContainer">

                                            <img src="<?php echo $fvSlideImg["url"]; ?>" alt="<?php echo $fvSlideImg["alt"]; ?>">
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" fill="none">
                            <path d="M6.30371 0.706975C6.01082 0.414081 5.53508 0.414081 5.24219 0.706975L0.469727 5.48041C0.176833 5.77331 0.176833 6.24807 0.469727 6.54096L5.24219 11.3144C5.53508 11.6073 6.01082 11.6073 6.30371 11.3144C6.5966 11.0215 6.5966 10.5458 6.30371 10.2529L2.81055 6.76069H17C17.4142 6.76069 17.75 6.4249 17.75 6.01069C17.75 5.59647 17.4142 5.26069 17 5.26069H2.81055L6.30371 1.7685C6.5966 1.4756 6.5966 0.999868 6.30371 0.706975Z" fill="white" />
                        </svg>
                    </button>
                    <button class="splide__arrow splide__arrow--next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" fill="none">
                            <path d="M11.6963 0.706975C11.9892 0.414081 12.4649 0.414081 12.7578 0.706975L17.5303 5.48041C17.8232 5.77331 17.8232 6.24807 17.5303 6.54096L12.7578 11.3144C12.4649 11.6073 11.9892 11.6073 11.6963 11.3144C11.4034 11.0215 11.4034 10.5458 11.6963 10.2529L15.1895 6.76069H1C0.585786 6.76069 0.25 6.4249 0.25 6.01069C0.25 5.59647 0.585786 5.26069 1 5.26069H15.1895L11.6963 1.7685C11.4034 1.4756 11.4034 0.999868 11.6963 0.706975Z" fill="white" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- About -->
        <div class="ly_commonContantsBgItemContainer">
            <picture class="ly_commonContantsBgItemContainer_item">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/about/top-about-curve-sp.svg" media="(max-width: 768px)">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/about/top-about-curve.svg" alt="">
            </picture>
            <section class="ly_commonContantsOuter ly_topAboutSec">
                <div class="ly_commonContantsOuter_inner bl_topAboutSec_inner">
                    <div class="bl_topAboutSec_leftSide">
                        <div class="bl_topAboutSec_leftSide_ttl">
                            <h2 class="bl_topAboutSec_leftSide_ttl_ttl">About</h2>
                            <img class="bl_topAboutSec_leftSide_ttl_line" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/ttl-line.svg" alt="">
                        </div>
                        <p class="bl_topAboutSec_leftSide_txt">この先もずっと<br>自分らしい美しさで</p>
                    </div>
                    <div class="bl_topAboutSec_rightSide">
                        <div class="bl_topAboutSec_rightSide_txtContainer">
                            <p class="el_topAboutSec_rightSide_txtContainer_txt">JUNCLINICは今だけでなく5年後、10年後も自然な美しさでいるためのご提案を大切にしています。</p>
                            <p class="el_topAboutSec_rightSide_txtContainer_txt">ただ肌治療をするだけでなく、調律をするかのようにお顔のバランスを保つご提案をしていきます。</p>
                        </div>
                        <div class="bl_topAboutSec_rightSide_btnContainer">
                            <a href="#" class="bl_commonBorderRadialArrowBtn">
                                <p class="el_commonBorderRadialArrowBtn_txt">初めての方へ</p>
                                <div class="el_commonBorderRadialArrowBtn_arrowContainer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8">
                                        <path d="M7.46484 0.464844C7.66011 0.269582 7.97661 0.269582 8.17188 0.464844L11.3535 3.64648C11.5488 3.84175 11.5488 4.15825 11.3535 4.35352L8.17188 7.53516C7.97661 7.73042 7.66011 7.73042 7.46484 7.53516C7.26958 7.33989 7.26958 7.02339 7.46484 6.82813L9.79297 4.5H1C0.723858 4.5 0.5 4.27614 0.5 4C0.5 3.72386 0.723858 3.5 1 3.5H9.79297L7.46484 1.17188C7.26958 0.976613 7.26958 0.660106 7.46484 0.464844Z" />
                                    </svg>
                                </div>
                            </a>
                            <a href="#" class="bl_commonBorderRadialArrowBtn">
                                <p class="el_commonBorderRadialArrowBtn_txt">JUN CLINICについて</p>
                                <div class="el_commonBorderRadialArrowBtn_arrowContainer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8">
                                        <path d="M7.46484 0.464844C7.66011 0.269582 7.97661 0.269582 8.17188 0.464844L11.3535 3.64648C11.5488 3.84175 11.5488 4.15825 11.3535 4.35352L8.17188 7.53516C7.97661 7.73042 7.66011 7.73042 7.46484 7.53516C7.26958 7.33989 7.26958 7.02339 7.46484 6.82813L9.79297 4.5H1C0.723858 4.5 0.5 4.27614 0.5 4C0.5 3.72386 0.723858 3.5 1 3.5H9.79297L7.46484 1.17188C7.26958 0.976613 7.26958 0.660106 7.46484 0.464844Z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <picture class="ly_commonContantsBgItemContainer_item">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/about/top-about-wave-sp.svg" media="(max-width: 768px)">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/about/top-about-wave.svg" alt="">
            </picture>
        </div>


        <!-- Featuer -->
        <section class="ly_topFeatureSec">
            <div class="bl_topFeatureSec_inner">
                <hgroup class="bl_commonSectionTtl bl_topFeatureSec_ttl">
                    <p class="el_commonSectionTtl_ttl">Feature</p>
                    <h2 class="el_commonSectionTtl_ttl_ttl">JUN CLINICの特徴</h2>
                </hgroup>
                <ol class="bl_topFeatureSec_featureContainer">
                    <li class="bl_topFeatureSec_featureContainer_item">
                        <div class="bl_topFeatureSec_featureContainer_item_inner">
                            <div class="bl_topFeatureSec_featureContainer_item_leftSide">
                                <div class="bl_topFeatureSec_featureContainer_item_ttl_ttlContainer">
                                    <h3 class="el_topFeatureSec_featureContainer_item_ttl_ttl">Feature 01</h3>
                                    <p class="el_topFeatureSec_featureContainer_item_ttl_ttl_txt">3つのアプローチで<br>あなた本来の美しさへ</p>
                                </div>
                                <div class="bl_featureSec_featureContainer_item_txtContainer">
                                    <p class="el_featureSec_featureContainer_item_txtContainer_txt">シミやたるみ、毛穴などお肌の悩みは多岐にわたります。</p>
                                    <ol class="el_featureSec_featureContainer_item_txtContainer_ol">
                                        <li>お一人おひとりの悩みに応じてレーザーの組み合わせやフルエンスを調整して行うオーダーメイド型の<span class="el_featuer_boldTxt">"カスタマイズレーザー治療"</span></li>
                                        <li>肌の再生力を上げ、レーザーの効果をさらに高める<span class="el_featuer_boldTxt">"肌育治療"</span></li>
                                        <li>骨格・脂肪・筋膜まで考慮した<span class="el_featuer_boldTxt">"たるみ治療"</span></li>
                                    </ol>
                                    <p class="el_featureSec_featureContainer_item_txtContainer_txt">顔を構造的にとらえ、<span class="el_featuer_boldTxt">皮から真皮、脂肪層、筋膜まで</span>表顔の全層にアプローチ。<br>外側からの照射や注入だけでなく、自らの再生力も引き出すことで、<span class="el_featuer_boldTxt">より自然に、そして効率よく結果へと導くための治療</span>を提供しています。</p>
                                </div>
                            </div>
                            <div class="bl_topFeatureSec_featureContainer_item_rightSide">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/feature/feature-01.png" alt="">
                            </div>
                        </div>
                    </li>
                    <li class="bl_topFeatureSec_featureContainer_item">
                        <div class="bl_topFeatureSec_featureContainer_item_inner">
                            <div class="bl_topFeatureSec_featureContainer_item_leftSide">
                                <div class="bl_topFeatureSec_featureContainer_item_ttl_ttlContainer">
                                    <h3 class="el_topFeatureSec_featureContainer_item_ttl_ttl">Feature 02</h3>
                                    <p class="el_topFeatureSec_featureContainer_item_ttl_ttl_txt">理想を支える確かな専門性</p>
                                </div>
                                <div class="bl_featureSec_featureContainer_item_txtContainer">
                                    <p class="el_featureSec_featureContainer_item_txtContainer_txt">豊富な経験と医学的根拠に基づきあなたに適した治療を提供します。</p>
                                    <div class="bl_featureSec_featureContainer_txtBox">
                                        <p class="bl_featureSec_featureContainer_txtBox_txt">肌を知り尽くす視点</p>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/feature/union.svg" alt="">
                                        <p class="bl_featureSec_featureContainer_txtBox_txt">悩みに最適な治療設計</p>
                                        <img class="bl_featureSec_featureContainer_txtBox_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/top/feature/union.svg" alt="">
                                        <p class="bl_featureSec_featureContainer_txtBox_txt">結果へ導く根拠ある治療</p>
                                    </div>
                                    <p class="el_featureSec_featureContainer_item_txtContainer_txt">
                                        JUNCLINICでは、2017年の開院からこれまでシミやくすみ、毛穴などのお悩みに対し、肌状態に合わせて複数の機器を組み合わせる<span class="el_featuer_boldTxt">カスタマイズレーザー治療</span>を軸に、確かな結果を積み重ねてきました。<br>近年ではさらに、<span class="el_featuer_boldTxt">肌育治療や高周波によるたるみ治療</span>といったアプローチも積極的に取り入れ、より効率的に、より自然で美しい素肌へと導く治療体制を整えています。<br>
                                        一人ひとりの肌と丁寧に向き合い、<span class="el_featuer_boldTxt">"あなたの肌"に必要なものだけを見極めて</span>ご提案する。<br>
                                        そのために私たちは、効果を裏づけるデータや症例をもとに、常に検証と改良を重ねています。
                                    </p>
                                </div>
                            </div>
                            <div class="bl_topFeatureSec_featureContainer_item_rightSide">
                                <img class="bl_topFeatureSec_featureContainer_item_rightSide_img bl_topFeatureSec_featureContainer_item_rightSide_img_01" src="<?php echo get_template_directory_uri(); ?>/assets/img/top/feature/rightSide_img_01.jpg" alt="">
                                <img class="bl_topFeatureSec_featureContainer_item_rightSide_img bl_topFeatureSec_featureContainer_item_rightSide_img_02" src="<?php echo get_template_directory_uri(); ?>/assets/img/top/feature/rightSide_img_02.jpg" alt="">
                            </div>
                        </div>
                    </li>
                </ol>
            </div>
        </section>

        <div class="bl_topSeminorContainer">
            <div class="bl_topSeminorContainer_inner">
                <img class="bl_topSeminorContainer_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/top/top-seminor.jpg" alt="">
                <div class="bl_commonBgContainer_txtContainer">
                    <p class="bl_commonBgContainer_txtContainer_txt">JUNCLINICでは皆様のお肌を治療し綺麗にするだけでなく、今までの症例を経て経験した新たな治験や知識、照射方法などを学会や勉強会、セミナーを通じて発表しています。</p>
                    <div class="bl_commonBgContainer_txtContainer_btnContainer">
                        <a href="#" class="bl_commonBorderRadialArrowBtn">
                            <p class="el_commonBorderRadialArrowBtn_txt">セミナー・学会報告一覧</p>
                            <div class="el_commonBorderRadialArrowBtn_arrowContainer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8">
                                    <path d="M7.46484 0.464844C7.66011 0.269582 7.97661 0.269582 8.17188 0.464844L11.3535 3.64648C11.5488 3.84175 11.5488 4.15825 11.3535 4.35352L8.17188 7.53516C7.97661 7.73042 7.66011 7.73042 7.46484 7.53516C7.26958 7.33989 7.26958 7.02339 7.46484 6.82813L9.79297 4.5H1C0.723858 4.5 0.5 4.27614 0.5 4C0.5 3.72386 0.723858 3.5 1 3.5H9.79297L7.46484 1.17188C7.26958 0.976613 7.26958 0.660106 7.46484 0.464844Z" />
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <section class="ly_commonContantsOuter ly_topSiteInfo">
            <div class="ly_commonContantsOuter_inner">
                <div class="bl_topSiteInfo_ttlContainer">
                    <hgroup class="bl_commonSectionTtl bl_topFeatureSec_ttl">
                        <p class="el_commonSectionTtl_ttl">Feature</p>
                        <h2 class="el_commonSectionTtl_ttl_ttl">JUN CLINICの特徴</h2>
                    </hgroup>
                </div>
                <ul class="bl_topSiteInfo_siteList">
                    <li class="bl_topSiteInfo_siteList_item">
                        <a href="https://junclinic.tokyo/" class="bl_topSiteInfo_siteList_item_btn" target="_blank">
                            <p>白金院</p>
                            <div class="bl_topSiteInfo_siteList_item_btn_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14">
                                    <rect x="3.5" y="1.89697" width="11" height="8" stroke="#333333" fill="none" />
                                    <path d="M1 4.604V12.604H12" stroke="#333333" fill="none" />
                                </svg>
                            </div>
                        </a>
                    </li>
                    <li class="bl_topSiteInfo_siteList_item">
                        <a href="https://jun-clinic-ginza.jp/" class="bl_topSiteInfo_siteList_item_btn" target="_blank">
                            <p>銀座院</p>
                            <div class="bl_topSiteInfo_siteList_item_btn_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14">
                                    <rect x="3.5" y="1.89697" width="11" height="8" stroke="#333333" fill="none" />
                                    <path d="M1 4.604V12.604H12" stroke="#333333" fill="none" />
                                </svg>
                            </div>
                        </a>
                    </li>
                    <li class="bl_topSiteInfo_siteList_item">
                        <a href="https://jun-clinic-yokohama.jp/" class="bl_topSiteInfo_siteList_item_btn" target="_blank">
                            <p>横浜院</p>
                            <div class="bl_topSiteInfo_siteList_item_btn_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14">
                                    <rect x="3.5" y="1.89697" width="11" height="8" stroke="#333333" fill="none" />
                                    <path d="M1 4.604V12.604H12" stroke="#333333" fill="none" />
                                </svg>
                            </div>
                        </a>
                    </li>
                    <li class="bl_topSiteInfo_siteList_item">
                        <a href="https://junclinic-tamaplaza.jp/" class="bl_topSiteInfo_siteList_item_btn" target="_blank">
                            <p>たまプラーザ院</p>
                            <div class="bl_topSiteInfo_siteList_item_btn_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14">
                                    <rect x="3.5" y="1.89697" width="11" height="8" stroke="#333333" fill="none" />
                                    <path d="M1 4.604V12.604H12" stroke="#333333" fill="none" />
                                </svg>
                            </div>
                        </a>
                    </li>
                    <li class="bl_topSiteInfo_siteList_item">
                        <a href="https://www.jun-clinic.jp/" class="bl_topSiteInfo_siteList_item_btn" target="_blank">
                            <p>長野院</p>
                            <div class="bl_topSiteInfo_siteList_item_btn_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14">
                                    <rect x="3.5" y="1.89697" width="11" height="8" stroke="#333333" fill="none" />
                                    <path d="M1 4.604V12.604H12" stroke="#333333" fill="none" />
                                </svg>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <div class="ly_commonContantsBgItemContainer">
            <picture class="ly_commonContantsBgItemContainer_item">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/recommend/rec-top-wave-sp.svg" media="(max-width: 768px)">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/recommend/rec-top-wave.svg" alt="">
            </picture>
            <section class="ly_commonContantsOuter ly_topRecommendSec">
                <div class="ly_commonContantsOuter_inner">
                    <div class="bl_topRecommendSec_ttlContainer">
                        <hgroup class="bl_commonSectionTtl bl_topFeatureSec_ttl">
                            <p class="el_commonSectionTtl_ttl">Recommend</p>
                            <h2 class="el_commonSectionTtl_ttl_ttl">おすすめ治療</h2>
                        </hgroup>
                    </div>
                    <ul class="bl_recommendBannerList">
                        <li class="bl_recommendBannerList_item">
                            <a href="" class="bl_recommendBannerList_item_btn">
                                <img class="bl_recommendBannerList_item_bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/top/recommend/banner-item.jpg" alt="カスタマイズレーザー治療">
                                <div class="bl_recommendBannerList_item_txtContainer">
                                    <p class="bl_recommendBannerList_item_txtContainer_ttl">カスタマイズレーザー治療</p>
                                    <p class="bl_recommendBannerList_item_txtContainer_txt">様々な悩みに同時にアプローチするオーダーメイドなレーザー治療です。</p>
                                </div>
                            </a>
                        </li>
                        <li class="bl_recommendBannerList_item">
                            <a href="" class="bl_recommendBannerList_item_btn">
                                <img class="bl_recommendBannerList_item_bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/top/recommend/banner-item.jpg" alt="カスタマイズレーザー治療">
                                <div class="bl_recommendBannerList_item_txtContainer">
                                    <p class="bl_recommendBannerList_item_txtContainer_ttl">カスタマイズレーザー治療</p>
                                    <p class="bl_recommendBannerList_item_txtContainer_txt">様々な悩みに同時にアプローチするオーダーメイドなレーザー治療です。</p>
                                </div>
                            </a>
                        </li>
                        <li class="bl_recommendBannerList_item">
                            <a href="" class="bl_recommendBannerList_item_btn">
                                <img class="bl_recommendBannerList_item_bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/top/recommend/banner-item.jpg" alt="カスタマイズレーザー治療">
                                <div class="bl_recommendBannerList_item_txtContainer">
                                    <p class="bl_recommendBannerList_item_txtContainer_ttl">カスタマイズレーザー治療</p>
                                    <p class="bl_recommendBannerList_item_txtContainer_txt">様々な悩みに同時にアプローチするオーダーメイドなレーザー治療です。</p>
                                </div>
                            </a>
                        </li>
                        <li class="bl_recommendBannerList_item">
                            <a href="" class="bl_recommendBannerList_item_btn">
                                <img class="bl_recommendBannerList_item_bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/top/recommend/banner-item.jpg" alt="カスタマイズレーザー治療">
                                <div class="bl_recommendBannerList_item_txtContainer">
                                    <p class="bl_recommendBannerList_item_txtContainer_ttl">カスタマイズレーザー治療</p>
                                    <p class="bl_recommendBannerList_item_txtContainer_txt">様々な悩みに同時にアプローチするオーダーメイドなレーザー治療です。</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <picture class="ly_commonContantsBgItemContainer_item">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/recommend/rec-top-wave-bottom-sp.svg" media="(max-width: 768px)">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/recommend/rec-top-wave-bottom.svg" alt="">
            </picture>
        </div>


        <!-- 症例 -->
        <section class="ly_commonContantsOuter ly_topCaseSec">
            <div class="ly_commonContantsOuter_inner">
                <div class="bl_topCaseSec_ttlContainer">
                    <hgroup class="bl_commonSectionTtl">
                        <p class="el_commonSectionTtl_ttl">Case</p>
                        <h2 class="el_commonSectionTtl_ttl_ttl">症例</h2>
                    </hgroup>
                </div>
                <div class="bl_caseListContainer bl_topCaseSec_caseListContainer">
                    <?php
                    $args = array(
                        'post_type' => 'case',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );
                    $case_query = new WP_Query($args);
                    if ($case_query->have_posts()) : ?>

                        <ul class="bl_caseList">

                            <?php while ($case_query->have_posts()) : $case_query->the_post(); ?>
                                <li class="bl_caseList_item">
                                    <a href="<?php the_permalink(); ?>" class="bl_caseList_item_btn">
                                        <div class="bl_caseList_item_imgContainer">
                                            <?php if (have_rows('slide')): ?>

                                                <?php
                                                $i = 0;
                                                ?>
                                                <?php while (have_rows('slide')): the_row(); ?>
                                                    <?php if ($i == 0): ?>
                                                        <img class="bl_caseList_item_imgContainer_img" src="<?php the_sub_field('img'); ?>" alt="<?php the_title(); ?>">
                                                    <?php endif; ?>
                                                    <?php $i++; ?>
                                                <?php endwhile; ?>

                                            <?php else : ?>

                                                <img class="bl_caseList_item_imgContainer_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/no-post.jpg" alt="<?php the_title(); ?>">

                                            <?php endif; ?>
                                        </div>

                                        <div class="bl_caseList_item_txtContainer">
                                            <div class="bl_bl_caseList_item_txtContainer_tagList">
                                                <?php
                                                $menu_select = get_field('menu_select');
                                                ?>
                                                <?php if (is_array($menu_select)) : ?>
                                                    <?php foreach ($menu_select as $menu) : ?>
                                                        <p class="el_caseList_item_txtContainer_tagList_item">#<?php echo esc_html($menu->post_title); ?></p>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <p class="bl_caseList_item_txtContainer_ttl"><?php the_title(); ?></p>
                                        </div>

                                        <dl class="bl_caseList_item_caseInfo">
                                            <?php
                                            $caseInfoSlugList  = ["case-price", "case-time", "case-downtime", "case-makeup", "case-risk"];
                                            ?>
                                            <?php foreach ($caseInfoSlugList as $caseInfoSlug) : ?>
                                                <?php
                                                $field_object = get_field_object($caseInfoSlug);
                                                $price = get_field($caseInfoSlug);
                                                ?>
                                                <div class="bl_caseList_item_caseInfo_item">
                                                    <dt class="bl_caseList_item_caseInfo_item_dt">
                                                        <?php echo esc_html($field_object['label']); ?>
                                                    </dt>
                                                    <dd class="bl_caseList_item_caseInfo_item_dd">
                                                        <?php echo esc_html($price); ?>
                                                    </dd>
                                                </div>
                                            <?php endforeach; ?>
                                        </dl>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="bl_topCaseSec_btnContainer">
                    <a href="#" class="bl_commonBorderRadialArrowBtn">
                        <p class="el_commonBorderRadialArrowBtn_txt">症例一覧</p>
                        <div class="el_commonBorderRadialArrowBtn_arrowContainer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8">
                                <path d="M7.46484 0.464844C7.66011 0.269582 7.97661 0.269582 8.17188 0.464844L11.3535 3.64648C11.5488 3.84175 11.5488 4.15825 11.3535 4.35352L8.17188 7.53516C7.97661 7.73042 7.66011 7.73042 7.46484 7.53516C7.26958 7.33989 7.26958 7.02339 7.46484 6.82813L9.79297 4.5H1C0.723858 4.5 0.5 4.27614 0.5 4C0.5 3.72386 0.723858 3.5 1 3.5H9.79297L7.46484 1.17188C7.26958 0.976613 7.26958 0.660106 7.46484 0.464844Z" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- 施術メニュー -->
        <div class="ly_commonContantsBgItemContainer">
            <picture class="ly_commonContantsBgItemContainer_item">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-sp.svg" media="(max-width: 768px)">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave.svg" alt="">
            </picture>
            <section class="ly_commonContantsOuter ly_topMenuSec">
                <div class="ly_commonContantsOuter_inner">
                    <div class="bl_topRecommendSec_ttlContainer">
                        <hgroup class="bl_commonSectionTtl bl_topMenuSec_ttlContainer">
                            <p class="el_commonSectionTtl_ttl">Menu</p>
                            <h2 class="el_commonSectionTtl_ttl_ttl">施術メニュー</h2>
                        </hgroup>
                    </div>

                    <!-- お悩みから探す -->
                    <div class="bl_topMenuSec_problemContainer">
                        <div class="bl_topMenuSec_problemContainer_ttlContainer">
                            <h3 class="el_topMenuSec_problemContainer_ttl">お悩みから探す</h3>
                        </div>
                        <?php
                        $problems = get_terms(array(
                            'taxonomy' => 'menu-problem',
                            'hide_empty' => true,
                        )); ?>
                        <ul class="bl_topMenuSec_problemContainer_problemList">
                            <?php foreach ($problems as $problem) : ?>
                                <li class="bl_topMenuSec_problemContainer_problemList_item">
                                    <a href="#<?php echo $problem->slug; ?>" class="bl_topMenuSec_problemContainer_problemList_item_btn">
                                        <div class="bl_topMenuSec_problemContainer_problemList_item_btn_imgContainer">
                                            <?php $problemCatImg = get_field('problemCat-img', $problem); ?>
                                            <?php if ($problemCatImg) : ?>
                                                <img class="bl_topMenuSec_problemContainer_problemList_item_btn_imgContainer_img" src="<?php echo $problemCatImg; ?>" alt="<?php echo $problem->name; ?>">
                                            <?php endif; ?>
                                            <p class="bl_topMenuSec_problemContainer_problemList_item_btn_imgContainer_ttl"><?php echo $problem->name; ?></p>
                                        </div>
                                        <p class="bl_topMenuSec_problemContainer_problemList_item_btn_txt">
                                            <?php echo $problem->description; ?>
                                        </p>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="bl_menuListContainer">
                        <div class="bl_menuListContainer_tabContainer">
                            <button class="bl_menuListContainer_tabContainer_btn is_active" type="button">美容皮膚科</button>
                            <button class="bl_menuListContainer_tabContainer_btn" type="button">美容外科</button>
                        </div>

                        <div class="bl_menuListContainer_content">
                            <?php
                            $args = array(
                                'post_type' => 'menu',
                                'posts_per_page' => -1,
                            );
                            $menuItems = new WP_Query($args);
                            if ($menuItems->have_posts()) : ?>
                                <ul class="bl_menuListContainer_menuList">
                                    <?php while ($menuItems->have_posts()) : $menuItems->the_post(); ?>
                                        <li class="bl_menuListContainer_menuList_item">
                                            <a href="<?php the_permalink(); ?>" class="bl_menuListContainer_menuList_item_link">
                                                <p class="bl_menuListContainer_menuList_item_link_ttl"><?php the_title(); ?></p>
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none">
                                                        <path d="M0.999999 8.51074L6 4.51074L1 0.510742" stroke="#333333" stroke-linecap="round" />
                                                    </svg>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endwhile;
                                    wp_reset_postdata(); ?>
                                </ul>
                            <?php else: ?>
                                <p>施術メニューはありません</p>
                            <?php endif; ?>
                        </div>

                        <div class="bl_topMenuSec_btnContainer">
                            <a href="#" class="bl_commonBorderRadialArrowBtn">
                                <p class="el_commonBorderRadialArrowBtn_txt">料金表を見る</p>
                                <div class="el_commonBorderRadialArrowBtn_arrowContainer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8">
                                        <path d="M7.46484 0.464844C7.66011 0.269582 7.97661 0.269582 8.17188 0.464844L11.3535 3.64648C11.5488 3.84175 11.5488 4.15825 11.3535 4.35352L8.17188 7.53516C7.97661 7.73042 7.66011 7.73042 7.46484 7.53516C7.26958 7.33989 7.26958 7.02339 7.46484 6.82813L9.79297 4.5H1C0.723858 4.5 0.5 4.27614 0.5 4C0.5 3.72386 0.723858 3.5 1 3.5H9.79297L7.46484 1.17188C7.26958 0.976613 7.26958 0.660106 7.46484 0.464844Z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <picture class="ly_commonContantsBgItemContainer_item">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-bottom-sp.svg" media="(max-width: 768px)">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/menu/top-menu-wave-bottom.svg" alt="">
            </picture>
        </div>

        <section class="ly_commonContantsOuter ly_topDoctorSec">
            <div class="ly_commonContantsOuter_inner">
                <div class="bl_topMenuSec_ttlContainer">
                    <hgroup class="bl_commonSectionTtl bl_topDoctorSec_ttlContainer">
                        <p class="el_commonSectionTtl_ttl">Doctor</p>
                        <h2 class="el_commonSectionTtl_ttl_ttl">ドクター紹介</h2>
                    </hgroup>
                </div>
                <div class="bl_topDoctorSec_doctorListContainer">
                    <div class="splide topDoctorSplide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php
                                $doctors = new WP_Query(array(
                                    'post_type' => 'doctor',
                                    'posts_per_page' => -1,
                                    'meta_query' => array(
                                        array(
                                            'key'     => 'doctor-top',
                                            'value'   => '1',
                                            'compare' => 'LIKE'
                                        ),
                                    ),
                                ));
                                if ($doctors->have_posts()) {
                                    while ($doctors->have_posts()) {
                                        $doctors->the_post();
                                ?>
                                        <li class="splide__slide">
                                            <a href="<?php the_permalink(); ?>" class="bl_topDoctorCard">
                                                <img class="el_topDoctorCard_img" src="<?php echo get_field('img'); ?>" alt="<?php the_title(); ?>">
                                                <div class="bl_topDoctorCard_txtContainer">
                                                    <div class="bl_topDoctorCard_txtContainer_ttlContainer">
                                                        <p class="el_topDoctorCard_txtContainer_ttlContainer_job"><?php echo get_field('job'); ?></p>
                                                        <p class="el_topDoctorCard_txtContainer_ttlContainer_ttl"><?php the_title(); ?></p>
                                                    </div>
                                                    <p class="bl_topDoctorCard_txtContainer_txt"><?php echo get_field('doctor-top-message'); ?></p>
                                                </div>
                                            </a>

                                        </li>
                                    <?php
                                    }
                                    wp_reset_postdata(); ?>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="splide__arrows">
                            <button class="splide__arrow splide__arrow--prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" fill="none">
                                    <path d="M6.30371 0.706975C6.01082 0.414081 5.53508 0.414081 5.24219 0.706975L0.469727 5.48041C0.176833 5.77331 0.176833 6.24807 0.469727 6.54096L5.24219 11.3144C5.53508 11.6073 6.01082 11.6073 6.30371 11.3144C6.5966 11.0215 6.5966 10.5458 6.30371 10.2529L2.81055 6.76069H17C17.4142 6.76069 17.75 6.4249 17.75 6.01069C17.75 5.59647 17.4142 5.26069 17 5.26069H2.81055L6.30371 1.7685C6.5966 1.4756 6.5966 0.999868 6.30371 0.706975Z" fill="white" />
                                </svg>
                            </button>
                            <button class="splide__arrow splide__arrow--next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" fill="none">
                                    <path d="M11.6963 0.706975C11.9892 0.414081 12.4649 0.414081 12.7578 0.706975L17.5303 5.48041C17.8232 5.77331 17.8232 6.24807 17.5303 6.54096L12.7578 11.3144C12.4649 11.6073 11.9892 11.6073 11.6963 11.3144C11.4034 11.0215 11.4034 10.5458 11.6963 10.2529L15.1895 6.76069H1C0.585786 6.76069 0.25 6.4249 0.25 6.01069C0.25 5.59647 0.585786 5.26069 1 5.26069H15.1895L11.6963 1.7685C11.4034 1.4756 11.4034 0.999868 11.6963 0.706975Z" fill="white" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="bl_topDoctorSec_btnContainer">
                        <a href="#" class="bl_commonBorderRadialArrowBtn">
                            <p class="el_commonBorderRadialArrowBtn_txt">ドクター一覧</p>
                            <div class="el_commonBorderRadialArrowBtn_arrowContainer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8">
                                    <path d="M7.46484 0.464844C7.66011 0.269582 7.97661 0.269582 8.17188 0.464844L11.3535 3.64648C11.5488 3.84175 11.5488 4.15825 11.3535 4.35352L8.17188 7.53516C7.97661 7.73042 7.66011 7.73042 7.46484 7.53516C7.26958 7.33989 7.26958 7.02339 7.46484 6.82813L9.79297 4.5H1C0.723858 4.5 0.5 4.27614 0.5 4C0.5 3.72386 0.723858 3.5 1 3.5H9.79297L7.46484 1.17188C7.26958 0.976613 7.26958 0.660106 7.46484 0.464844Z" />
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>


        <!-- お知らせ -->
        <div class="ly_commonContantsBgItemContainer">
            <picture class="ly_commonContantsBgItemContainer_item">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/news/top-news-wave-sp.svg" media="(max-width: 768px)">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/news/top-news-wave.svg" alt="">
            </picture>
            <section class="ly_commonContantsOuter ly_topNewsSec">
                <div class="ly_commonContantsOuter_inner bl_topNewsSec_inner">
                    <div class="bl_topNewsSec_ttlContainer">
                        <div class="bl_topRecommendSec_ttlContainer">
                            <hgroup class="bl_commonSectionTtl bl_topNewsSec_ttlContainer">
                                <p class="el_commonSectionTtl_ttl">News</p>
                                <h2 class="el_commonSectionTtl_ttl_ttl">お知らせ</h2>
                            </hgroup>
                        </div>
                        <div class="bl_topDoctorSec_btnContainer">
                            <a href="#" class="bl_commonBorderRadialArrowBtn">
                                <p class="el_commonBorderRadialArrowBtn_txt">お知らせ一覧</p>
                                <div class="el_commonBorderRadialArrowBtn_arrowContainer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8">
                                        <path d="M7.46484 0.464844C7.66011 0.269582 7.97661 0.269582 8.17188 0.464844L11.3535 3.64648C11.5488 3.84175 11.5488 4.15825 11.3535 4.35352L8.17188 7.53516C7.97661 7.73042 7.66011 7.73042 7.46484 7.53516C7.26958 7.33989 7.26958 7.02339 7.46484 6.82813L9.79297 4.5H1C0.723858 4.5 0.5 4.27614 0.5 4C0.5 3.72386 0.723858 3.5 1 3.5H9.79297L7.46484 1.17188C7.26958 0.976613 7.26958 0.660106 7.46484 0.464844Z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="bl_topNewsSec_newsListContainer">
                        <?php
                        $args = array(
                            'post_type' => 'news',
                            'posts_per_page' => -1,
                        );
                        $newsItems = new WP_Query($args);
                        if ($newsItems->have_posts()) : ?>
                            <ul class="bl_newsList">
                                <?php while ($newsItems->have_posts()) : $newsItems->the_post(); ?>

                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'clinic-cat');
                                    $clinic_name = '';
                                    if ($terms && !is_wp_error($terms) && !empty($terms)) {
                                        $clinic_name = $terms[0]->name;
                                    }
                                    ?>

                                    <li class="bl_newsList_item">
                                        <a href="<?php the_permalink(); ?>" class="bl_newsList_item_link">
                                            <div class="bl_newsList_item_link_infoContainer">
                                                <p class="bl_newsList_item_link_infoContainer_date"><?php the_date('Y.m.d'); ?></p>
                                                <?php if (!empty($clinic_name)) : ?>
                                                    <p class="bl_newsList_item_link_infoContainer_clinic"><?php echo esc_html($clinic_name); ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <p class="bl_newsList_item_link_ttl"><?php the_title(); ?></p>
                                        </a>
                                    </li>

                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            </ul>

                        <?php else: ?>
                            <div class="bl_topNewsSec_noNewsContainer">
                                <p class="bl_topNewsSec_noNewsContainer_txt">お知らせはありません</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <picture class="ly_commonContantsBgItemContainer_item">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top/news/top-news-wave-bottom-sp.svg" media="(max-width: 768px)">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/news/top-news-bottom.svg" alt="">
            </picture>
        </div>

        <!-- トピックス -->
        <section class="ly_commonContantsOuter ly_topTopicSec">
            <div class="ly_commonContantsOuter_inner">
                <div class="bl_topRecommendSec_ttlContainer">
                    <hgroup class="bl_commonSectionTtl bl_topTopicSec_ttlContainer">
                        <p class="el_commonSectionTtl_ttl">Topics</p>
                        <h2 class="el_commonSectionTtl_ttl_ttl">トピックス</h2>
                    </hgroup>
                </div>
                <div class="bl_topTopicSec_topicsContainer">
                    <?php
                    $subLoop = new WP_Query(array(
                        'post_type' => 'topics',
                        'posts_per_page' => 3,
                    ));
                    if ($subLoop->have_posts()) : ?>

                        <ul class="bl_topicsList">
                            <?php while ($subLoop->have_posts()) : $subLoop->the_post(); ?>
                                <li class="bl_topicsList_item">
                                    <a href="<?php the_permalink(); ?>" class="bl_topicsList_item_link">
                                        <div class="bl_topicsList_item_link_imgContainer">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <img class="bl_topicsList_item_link_img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                            <?php else: ?>
                                                <img class="bl_topicsList_item_link_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/no-post.jpg" alt="<?php the_title(); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="bl_topicsList_item_link_infoContainer">
                                            <div class="bl_topicsList_item_link_info">
                                                <p class="bl_topicsList_item_link_info_date"><?php the_date('Y.m.d'); ?></p>
                                                <?php
                                                $taxonomies = array('clinic-cat',  'topics-cat');
                                                $terms_list = array();
                                                foreach ($taxonomies as $taxonomy) {
                                                    $terms = get_the_terms(get_the_ID(), $taxonomy);
                                                    if ($terms && !is_wp_error($terms)) {
                                                        foreach ($terms as $term) {
                                                            $terms_list[] = $term->name;
                                                        }
                                                    }
                                                }
                                                if (!empty($terms_list)) : ?>
                                                    <div class="bl_topicsList_item_link_info_termContainer">
                                                        <?php foreach ($terms_list as $term): ?>
                                                            <p class="bl_topicsList_item_link_info_term"><?php echo esc_html($term); ?></p>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <p class="el_topicsList_item_link_ttl"><?php the_title(); ?></p>
                                        </div>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>

                    <?php endif;
                    wp_reset_postdata(); ?>
                </div>
                <div class="bl_topTopicSec_btnContainer">
                    <a href="#" class="bl_commonBorderRadialArrowBtn">
                        <p class="el_commonBorderRadialArrowBtn_txt">トピックス一覧</p>
                        <div class="el_commonBorderRadialArrowBtn_arrowContainer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8">
                                <path d="M7.46484 0.464844C7.66011 0.269582 7.97661 0.269582 8.17188 0.464844L11.3535 3.64648C11.5488 3.84175 11.5488 4.15825 11.3535 4.35352L8.17188 7.53516C7.97661 7.73042 7.66011 7.73042 7.46484 7.53516C7.26958 7.33989 7.26958 7.02339 7.46484 6.82813L9.79297 4.5H1C0.723858 4.5 0.5 4.27614 0.5 4C0.5 3.72386 0.723858 3.5 1 3.5H9.79297L7.46484 1.17188C7.26958 0.976613 7.26958 0.660106 7.46484 0.464844Z" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
</body>

</html>