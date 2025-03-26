<x-logout-layout>
<section class="login-container">
  <div class="login-card">
    <div id="clear">
      <div class="add-title">
        <p>{{ session('username')}}さん<br>ようこそ！AtlasSNSへ！</p>
      </div>

      <div class="add-comment">
        <p>ユーザー登録が完了しました。<br>早速ログインをしてみましょう。</p>
      </div>


    <p class="add-login-button"><a href="login">ログイン画面へ</a></p>
  </div>
  </div>

</section>

</x-logout-layout>
