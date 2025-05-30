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

  const tabs = document.querySelectorAll('.bl_menuListContainer_tabContainer_btn');
  const menuContentList = [...document.querySelectorAll('.bl_menuListContainer_content')];
  tabs.forEach((tab, idx) => {
    tab.addEventListener('click', function () {

      //ボタン
      tabs.forEach(t => t.classList.remove('is_active'));
      tab.classList.add('is_active');
      const tabId = tab.getAttribute('id');

      menuContentList.forEach(menuContent => {
        menuContent.classList.remove('is_activeTab');
        const contentId = menuContent.getAttribute('data-menutab');

        if (tabId == contentId) {
          menuContent.classList.add('is_activeTab');
        }
      });

    });
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
          contents.classList.toggle('is_priceListContainerActive');
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