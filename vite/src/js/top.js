import Splide from '@splidejs/splide';
import '@splidejs/splide/css';

document.addEventListener('DOMContentLoaded', () => {
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
});     