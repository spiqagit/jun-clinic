import { gsap } from "gsap";

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
  const contents = document.querySelectorAll('.bl_menuListContainer_tabContainer_content');
  tabs.forEach((tab, idx) => {
    tab.addEventListener('click', function () {
      tabs.forEach(t => t.classList.remove('is_active'));
      contents.forEach(c => c.classList.remove('is_active'));
      tab.classList.add('is_active');
      contents[idx].classList.add('is_active');
    });
  });


});