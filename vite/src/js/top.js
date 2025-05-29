import Splide from '@splidejs/splide';

document.addEventListener('DOMContentLoaded', () => {
    // FVスライダー
    const fvSlideElement = document.querySelector('.fvSlide');
    if (fvSlideElement) {
        const fvSlide = new Splide('.fvSlide', {
            type: 'loop',
            perPage: 1,         // 1枚表示
            perMove: 1,
            pagination: false,
            arrows: true,
            autoplay: true,
            rewind: true,
            focus: 'center',    // 中央揃え
            updateOnMove: true,
            autoWidth: true,
        });
        fvSlide.mount();
    }

    // ドクター紹介スライダー
    const topDoctorSplideElement = document.querySelector('.topDoctorSplide');
    if (topDoctorSplideElement) {
        const topDoctorSplide = new Splide('.topDoctorSplide', {
            type: 'loop',
            pagination: false,
            arrows: true,
            autoplay: false,    // 自動再生なし
            rewind: true,
            focus: 'center',    // 中央揃え
            updateOnMove: true,
            gap: 40,
        });
        topDoctorSplide.mount();
    }
});     