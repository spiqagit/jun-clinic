//header
window.addEventListener('scroll', function() {
  var scrollPosition = window.scrollY || window.pageYOffset; // 現在のスクロール位置を取得
  var logoElement = document.querySelector('.ly_header'); // ターゲット要素を取得

  if (scrollPosition > 500) { // スクロール位置が500pxを超えた場合
      logoElement.classList.add('is_view'); // クラス「is_view」を追加
  } else {
      logoElement.classList.remove('is_view'); // 500px未満の場合はクラスを削除
  }
});
