// $(function () { // if document is ready
//   alert('hello world')
// });


$(document).ready(function () {
  $('.menu-btn').on('click', function () {
    const content = $(this).next('.tag');
    content.slideToggle(300);
    $('.tag').not(content).slideDown();
    $(this).toggleClass(300)
  });
});

// $(document).ready(function () {
//   $('.menu-btn').on('click', function (event) {
//     event.stopPropagation(); // クリックイベントの伝播を防止
//     const content = $(this).next('.tag'); // 次の .tag 要素を取得

//     // メニューの開閉状態を切り替える
//     content.slideToggle(300);

//     // 三角ボタンの状態を切り替え
//     $(this).toggleClass('open');

//     // 他のメニューは閉じる
//     $('.tag').not(content).slideUp(300);
//     $('.menu-btn').not(this).removeClass('open');
//   });

//   // メニュー外をクリックしたらすべて閉じる
//   $(document).on('click', function () {
//     $('.tag').slideUp(300);
//     $('.menu-btn').removeClass('open');
//   });
// });



// $(document).ready(function () {
//   $('.menu-btn').on('click', function (event) {
//     event.stopPropagation(); // クリックイベントの伝播を防止
//     const content = $(this).next('.tag'); // 次の .tag 要素を取得

//     if (content.is(':visible')) {
//       content.slideUp(300); // 開いている場合は閉じる
//     } else {
//       $('.tag').slideUp(300); // 他のすべてのメニューを閉じる
//       content.slideDown(300); // 対象メニューを開く
//     }
//   });

//   // メニュー外をクリックしたらすべて閉じる
//   $(document).on('click', function () {
//     $('.tag').slideUp(300);
//   });
// });
