<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="/path/to/script.js"></script>

</head>

<body>
  <header>
    @include('layouts.navigation')
  </header>
  <!-- Page Content -->
  <div id="row">
    <div id="container">
      {{ $slot }}
    </div>
    <div id="side-bar">
      <div id="confirm">
        <p>{{Auth::user()->username}}さんの</p>
        <div class="follow-section">
          <span>フォロー数</span>
          <span>{{Auth::user()->followed()->count()}}名</span>
        </div>
        <div class="follow-side-btn">
          <p class="side-btn-primary"><a href="/follow-list">フォローリスト</a></p>
        </div>
        <div class="follow-section">
          <span>フォロワー数</span>
          <span>{{Auth::user()->following()->count()}}名</span>
        </div>
        <div class="follow-side-btn">
          <p class="side-btn-primary"><a href="/follower-list">フォロワーリスト</a></p>
        </div>
      </div>
      <diV class="search-container">
        <p class="side-btn-primary search-button"><a href="/search">ユーザー検索</a></p>
      </diV>
    </div>
  </div>
  <footer>
  </footer>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="JavaScriptファイルのURL"></script>
  <script src="JavaScriptファイルのURL"></script>
</body>

</html>
