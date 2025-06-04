import { gsap } from "gsap";
import Splide from '@splidejs/splide';
import '@splidejs/splide/css';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';

document.addEventListener('DOMContentLoaded', () => {

  //Navi
  const headerMenuBtn = document.querySelector('#headerMenuBtn');
  const headerNav = document.querySelector('.bl_header_nav');

  headerMenuBtn.addEventListener('click', () => {

    if (headerMenuBtn.classList.contains('animating')) return; // 連打防止

    document.body.classList.toggle('is_noScroll');

    const isActive = headerNav.classList.contains('is_active');
    headerMenuBtn.classList.add('animating');
    headerMenuBtn.classList.toggle('is_active');

    if (!isActive) {
      // フェードイン
      headerNav.style.display = 'block';
      gsap.fromTo(headerNav,
        { opacity: 0 },
        {
          opacity: 1,
          duration: 0.5,
          ease: "power1.out",
          onStart: () => {
            headerNav.classList.add('is_active');
          },
          onComplete: () => {
            headerMenuBtn.classList.remove('animating'); // アニメーション終了で解除
          }
        }
      );
    } else {
      // フェードアウト
      gsap.to(headerNav, {
        opacity: 0,
        duration: 0.5,
        ease: "power1.out",
        onComplete: () => {
          headerNav.style.display = 'none';
          headerNav.classList.remove('is_active');
          headerMenuBtn.classList.remove('animating'); // アニメーション終了で解除
        }
      });
    }
  });

  /* --------------------------------
  メニュータブ
  -------------------------------- */
  const tabs = document.querySelectorAll('#dermatology, #surgery');
  const menuContentList = [...document.querySelectorAll('.bl_menuListContainer_content')];

  // 初期状態の設定
  menuContentList.forEach(menuContent => {
    menuContent.style.display = 'none';
  });

  // 最初のタブをアクティブに
  const firstTab = tabs[0];
  const firstContent = menuContentList.find(content =>
    content.getAttribute('data-menutab') === firstTab.getAttribute('id')
  );
  if (firstContent) {
    firstContent.style.display = 'block';
    firstContent.classList.add('is_activeTab');
    firstTab.classList.add('is_active');
  }

  tabs.forEach((tab) => {
    tab.addEventListener('click', function () {
      // 現在のタブがアクティブな場合は何もしない
      if (tab.classList.contains('is_active')) return;

      // ボタン
      tabs.forEach(t => t.classList.remove('is_active'));
      tab.classList.add('is_active');
      const tabId = tab.getAttribute('id');

      menuContentList.forEach(menuContent => {
        const contentId = menuContent.getAttribute('data-menutab');

        if (tabId === contentId) {
          // 表示するコンテンツ
          menuContent.style.display = 'block';
          menuContent.classList.add('is_activeTab');
        } else {
          // 非表示にするコンテンツ
          menuContent.style.display = 'none';
          menuContent.classList.remove('is_activeTab');
        }
      });
    });
  });



  /* --------------------------------
  ポップアップ制御
  -------------------------------- */
  const createPopup = (triggerId, modalId, options = {}) => {
    const {
      closeBtnClass = '.el_lineReserveModal_inner_closeBtn',
      duration = 0.5,
      ease = "power1.out",
      activeClass = 'is_active' // アクティブクラス名
    } = options;

    const trigger = document.getElementById(triggerId);
    const modal = document.getElementById(modalId);
    const closeBtn = modal.querySelector(closeBtnClass) || null;

    if (!trigger || !modal) return;

    let isAnimating = false;
    let isOpen = false;

    // ポップアップを開く
    const open = () => {
      if (isAnimating) return;

      isAnimating = true;
      isOpen = true;

      // アニメーション前に表示
      modal.style.display = 'block';

      gsap.fromTo(modal,
        { opacity: 0 },
        {
          opacity: 1,
          duration,
          ease,
          onStart: () => {
            modal.classList.add(activeClass);
          },
          onComplete: () => {
            isAnimating = false;
          }
        }
      );
    };

    // ポップアップを閉じる
    const close = () => {
      if (isAnimating) return;

      isAnimating = true;
      isOpen = false;

      gsap.to(modal, {
        opacity: 0,
        duration,
        ease,
        onComplete: () => {
          modal.classList.remove(activeClass);
          // アニメーション後に非表示
          modal.style.display = 'none';
          isAnimating = false;
        }
      });
    };

    // トグル
    const toggle = () => {
      if (isOpen) {
        close();
      } else {
        open();
      }
    };

    // イベントリスナーの設定
    trigger.addEventListener('click', toggle);

    if (closeBtn) {
      closeBtn.addEventListener('click', close);
    }

    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        close();
      }
    });

    // 外部から操作できるように関数を返す
    return {
      open,
      close,
      toggle
    };
  };


  // LINE予約モーダルの初期化
  const naviReserve = createPopup('naviLineReserveBtn', 'naviLineReserveModal', {
    closeBtnClass: '.el_lineReserveModal_inner_closeBtn',
    duration: 0.5,
    activeClass: 'is_lineReserveModal_active'
  });

  const menuReserve = createPopup('menuLineReserveBtn', 'menuLineReserveModal', {
    closeBtnClass: '.el_lineReserveModal_inner_closeBtn',
    duration: 0.5,
    activeClass: 'is_lineReserveModal_active'
  });

  const footerReserve = createPopup('footerLineReserveBtn', 'footerLineReserveModal', {
    closeBtnClass: '.el_lineReserveModal_inner_closeBtn',
    duration: 0.5,
    activeClass: 'is_lineReserveModal_active'
  });



  /* --------------------------------
  料金表タブ
  -------------------------------- */
  const priceClinicBtnList = [...document.querySelectorAll('.el_priceSec_seideMenuContainer_item_select_btn')];
  const priceClinicContentList = [...document.querySelectorAll('.bl_priceListContainer')];

  priceClinicBtnList.forEach((btn, idx) => {

    btn.addEventListener('click', () => {
      priceClinicBtnList.forEach(b => b.classList.remove('is-active'));
      btn.classList.add('is-active');

      priceClinicContentList.forEach(contents => {

        const clinicId = contents.getAttribute('data-clinic');
        const clinicBtnId = btn.getAttribute('id');

        contents.classList.remove('is_priceListContainerActive');

        if (clinicId == clinicBtnId) {
          contents.classList.add('is_priceListContainerActive');
        }
      })

    });

  });


  /* --------------------------------
  記事ナビゲーション
  -------------------------------- */
  const article = document.querySelector('.bl_articlePage_article');
  const articleNavi = document.getElementById('article-navi');

  if (articleNavi && article) {

    //ナビゲーションのリストを作成
    const h2Elements = [...article.querySelectorAll('h2')];

    h2Elements.forEach((h2, idx) => {
      h2.setAttribute('id', `article-${idx + 1}`);
    });

    if (articleNavi) {
      const ul = document.createElement('ul');
      ul.classList.add('bl_naviContainer_list');

      h2Elements.forEach((h2, idx) => {
        const li = document.createElement('li');
        const a = document.createElement('a');

        //先頭
        if (idx === 0) {
          a.classList.add('is_naviContainer_list_btn_active');
        }

        a.classList.add('el_naviContainer_list_btn');

        a.href = `#article-${idx + 1}`;
        a.textContent = h2.textContent;

        li.appendChild(a);
        ul.appendChild(li);
      });

      articleNavi.appendChild(ul);
    }

    //ナビゲーション 位置判定
    const naviBtnActiveClass = "is_naviContainer_list_btn_active";

    const observer = new IntersectionObserver((entries) => {
      const navItemList = [...document.querySelectorAll('.el_naviContainer_list_btn')];

      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const targetId = entry.target.getAttribute('id');

          navItemList.forEach(navItem => {
            const navItemId = navItem.getAttribute('href').replace('#', '');
            navItem.classList.toggle(naviBtnActiveClass, navItemId === targetId);
          });
        }
      });
    }, {
      root: null, // 今回はビューポートをルート要素とする
      rootMargin: "-50% 0px", // ビューポートの中心を判定基準にする
      threshold: 0 // 閾値は0
    });

    h2Elements.forEach((h2) => {

      // ウィンドウの幅が768px以下の場合は処理をスキップ
      if (window.innerWidth <= 768) {
        return;
      }

      observer.observe(h2);
    });
  }



  /* --------------------------------
  アコーディオン
  -------------------------------- */
  const accordionItems = document.querySelectorAll('.bl_commonfaqList_item_details');

  accordionItems.forEach(item => {
    const summary = item.querySelector('.bl_commonfaqList_item_details_summary');
    const panel = item.querySelector('.bl_commonfaqList_item_details_panel');
    const panelInner = item.querySelector('.bl_commonfaqList_item_details_panel_inner');
    const icon = item.querySelector('.el_commonfaqList_item_details_summary_icon');

    // 初期状態を設定
    gsap.set(panel, {
      height: 0,
      opacity: 0,
      marginTop: 0
    });

    summary.addEventListener('click', (e) => {
      e.preventDefault();

      const isOpen = item.hasAttribute('open');

      // 現在のアコーディオンの開閉
      if (isOpen) {
        // 閉じる前の高さを取得
        const startHeight = panel.scrollHeight;

        gsap.to(panel, {
          height: 0,
          opacity: 0,
          duration: 0.4,
          ease: "power3.out",
          onStart: () => {
            // アニメーション開始時に高さを固定
            gsap.set(panel, {
              height: startHeight,
            });
          },
          onComplete: () => {
            item.removeAttribute('open');
            // アニメーション完了後に高さを0に設定
            gsap.set(panel, {
              height: 0,
              marginTop: 0
            });
          }
        });

        icon.classList.remove('is_open');
      } else {
        item.setAttribute('open', '');

        // 開く前の高さを取得
        const endHeight = panel.scrollHeight;

        gsap.to(panel, {
          height: endHeight,
          opacity: 1,
          duration: 0.4,
          ease: "power2.out",
          onComplete: () => {
            // アニメーション完了後に高さをautoに設定
            gsap.set(panel, {
              height: 'auto',
            });
          }
        });

        icon.classList.add('is_open');
      }
    });
  });



  /* --------------------------------
  施術メニュー 症例スライド
  -------------------------------- */
  const menuCaseSplide = [...document.querySelectorAll('.bl_menuCaseSec_splide')];

  menuCaseSplide.forEach(splide => {
    const slidesCount = splide.querySelectorAll('.splide__slide').length;

    new Splide(splide, {
      type: 'slide',
      autoWidth: true,
      gap: 20,
      pagination: true,
      autoHeight: true,
      breakpoints: {
        1024: {
          perPage: 2,
          autoWidth: false,
        },
        768: {
          perPage: 1,
          autoWidth: false,
        }
      }
    }).mount();


  });





});


/* --------------------------------
ドクター
-------------------------------- */
document.addEventListener('DOMContentLoaded', function () {

  const details = document.querySelectorAll('.bl_accordion details');
  details.forEach((detail) => {
    const summary = detail.querySelector('summary');
    const content = detail.querySelector('.content');
    const icon = summary.querySelector('.js-icon');
    const iconVertical = icon.querySelector('::before');

    summary.addEventListener('click', (e) => {
      e.preventDefault(); // デフォルトの動作を防ぐ

      if (detail.open) {
        // アコーディオンを閉じる
        content.animate([
          { maxHeight: content.scrollHeight + 'px', opacity: 1 },
          { maxHeight: '0', opacity: 0 }
        ], {
          duration: 300,
          easing: 'ease-out'
        }).onfinish = () => {
          detail.removeAttribute('open');
          // アニメーション後、maxHeightを解除
          content.style.maxHeight = '';
        };

        // アイコンのアニメーション
        icon.animate([
          { transform: 'rotate(0deg)' }
        ], {
          duration: 300,
          easing: 'ease-out'
        });

        iconVertical.animate([
          { transform: 'scaleY(0)' },
          { transform: 'scaleY(1)' }
        ], {
          duration: 300,
          easing: 'ease-out'
        });
      } else {
        // アコーディオンを開く
        detail.setAttribute('open', '');
        content.animate([
          { maxHeight: '0', opacity: 0 },
          { maxHeight: content.scrollHeight + 'px', opacity: 1 }
        ], {
          duration: 300,
          easing: 'ease-out'
        }).onfinish = () => {
          // アニメーション後、maxHeightを解除
          content.style.maxHeight = '';
        };

        // アイコンのアニメーション
        icon.animate([
          { transform: 'rotate(0deg)' }
        ], {
          duration: 300,
          easing: 'ease-out'
        });

        iconVertical.animate([
          { transform: 'scaleY(1)' },
          { transform: 'scaleY(0)' }
        ], {
          duration: 300,
          easing: 'ease-out'
        });
      }
    });
  });

});

/* --------------------------------
クリニック
-------------------------------- */
document.addEventListener('DOMContentLoaded', function () {

  const options = {
    type: "loop", // ループさせる
    arrows: false, // 矢印ボタンを非表示
    pagination: false, // ページネーションを非表示
    drag: false, // ドラッグ無効
    gap: 20, // スライド間の余白
    autoWidth: true,
    height: 'auto',
    breakpoints: {
      767: {
        height: 'auto',
      },
      500: {
        gap: 15,
      },
    },
    autoScroll: {
      speed: 1, // スクロール速度
      pauseOnHover: false, // カーソルが乗ってもスクロールを停止させない
    },
  };

  const clinicSlider = document.querySelector(".clinic-slider");
  if (clinicSlider) {
    const splide = new Splide(clinicSlider, options);
    splide.mount({ AutoScroll });
  }

  const scheduleSlider = document.querySelector(".schedule-slider_01");
  if (scheduleSlider) {
    new Splide(scheduleSlider).mount();
  }

  const topicsSplide = document.querySelector('.splide_topics');
  if (topicsSplide) {
    new Splide(topicsSplide, {
      type: 'loop',      // or 'loop'
      perPage: 1,            // 1ページに表示するスライド数
      perMove: 1,            // 1回の移動でスライドする数
      gap: '1rem',       // スライド間の余白
      pagination: true,      // ページネーションを非表示
      arrows: true,           // ナビゲーション矢印（必要に応じて）
      breakpoints: {
        768: {
          perPage: 1         // スマホでは1枚にするなどレスポンシブ対応
        }
      }
    }).mount();
  }

});