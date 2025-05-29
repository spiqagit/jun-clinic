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


  //料金表タブ
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


  //記事ナビゲーション
  const article = document.querySelector('.bl_articlePage_article');

  if(article){
    const h2Elements = [...article.querySelectorAll('h2')];

    h2Elements.forEach((h2, idx) => {
      h2.setAttribute('id', `article-${idx + 1}`);
    });

    const articleNavi = document.querySelector('#article-navi');
    
    if(articleNavi) {
      const ul = document.createElement('ul');
      
      h2Elements.forEach((h2, idx) => {
        const li = document.createElement('li');
        const a = document.createElement('a');
        
        a.href = `#article-${idx + 1}`;
        a.textContent = h2.textContent;
        
        li.appendChild(a);
        ul.appendChild(li);
      });
      
      articleNavi.appendChild(ul);
    }
  }
});