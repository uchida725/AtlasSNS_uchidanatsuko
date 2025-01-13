// $(function () { // if document is ready
//   alert('hello world')
// });


$(document).ready(function () {
  $('.menu-btn').on('click', function () {
    const content = $(this).next('.tag');
    // 三角ボタンの状態を切り替え
    $(this).toggleClass('open');
    $('.tag').not(content).slideToggle();

  });
});
