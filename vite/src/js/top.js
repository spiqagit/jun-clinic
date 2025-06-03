import Splide from '@splidejs/splide';

document.addEventListener('DOMContentLoaded', () => {


  // FVスライダー
  const fvSlideElement = document.querySelector('.fvSlide');
  if (fvSlideElement) {
    const fvSlide = new Splide('.fvSlide', {
      type: 'loop',
      autoWidth: false,
      focus: 'center',
      gap: 40,
      pagination: false,
      arrows: true,
      autoplay: false,
      rewind: true,
      updateOnMove: true,
      perPage: 1,
      width: '100%',
      fixedWidth: false,
      breakpoints: {
        768: {
          gap: 20,
        }
      }
    });

    // 初期化後に再描画
    fvSlide.on('mounted', () => {
      setTimeout(() => {
        fvSlide.refresh();
      }, 100);
    });

    fvSlide.mount();
  }

  // ドクター紹介スライダー
  const topDoctorSplideElement = document.querySelector('.topDoctorSplide');
  if (topDoctorSplideElement) {
    const topDoctorSplide = new Splide('.topDoctorSplide', {
      type: 'loop',
      autoWidth: true,
      focus: 'center',
      pagination: false,
      arrows: true,
      autoplay: false,
      rewind: true,
      updateOnMove: true,
      waitForTransition: true,
      interval: 2000, 
      speed: 1000, 
      gap: 40,
      breakpoints: {
        768: {
          gap: 20,
        }
      }
    });

    // 初期化後に再描画
    topDoctorSplide.on('mounted', () => {
      setTimeout(() => {
        topDoctorSplide.refresh();
      }, 100);
    });
    topDoctorSplide.mount();
  }
});

