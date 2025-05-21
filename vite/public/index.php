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
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/white-arrow.svg" alt="">
                    </button>
                    <button class="splide__arrow splide__arrow--next">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/white-arrow.svg" alt="">
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
                <div class="ly_commonContantsInner bl_topAboutSec_inner">
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
                                        <li>お一人おひとりの悩みに応じてレーザーの組み合わせやフルエンスを調整して行うオーダーメイド型の<span class="el_featuer_boldTxt">“カスタマイズレーザー治療”</span></li>
                                        <li>肌の再生力を上げ、レーザーの効果をさらに高める<span class="el_featuer_boldTxt">“肌育治療”</span></li>
                                        <li>骨格・脂肪・筋膜まで考慮した<span class="el_featuer_boldTxt">“たるみ治療”</span></li>
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
                                        一人ひとりの肌と丁寧に向き合い、<span class="el_featuer_boldTxt">“あなたの肌”に必要なものだけを見極めて</span>ご提案する。<br>
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

        
    </main>
    <?php get_footer(); ?>
</body>

</html>