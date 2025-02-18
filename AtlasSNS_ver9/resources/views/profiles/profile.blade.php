<x-login-layout>
<div class="container">
  <div class="update">
    <!-- {!! Form::open(['url' => route('profile.update'),'method' =>'post','enctype' =>'multipart/form-data']) !!} -->
     {!! Form::open(['url' => 'users/profile', "enctype" => "multipart/form-data"]) !!}
     <!-- ↑保護しながらフォームタグの作成。送信先のURLの設定。<form action="/profile" method="post">の略。 -->
     <!-- "enctype" => "multipart/form-data"はファイルアップロードを可能にするための設定。 -->
      <!-- なぜ multipart/form-data が必要？ -->
<!-- もしフォームで 画像やファイルをアップロード したい場合、multipart/form-data を設定しないと正しく送信できない -->
<!-- 例えば、<input type="file"> を使う時には 必須 ！ -->

    @csrf
    <!-- ↑Laravelでは、POST・PUT・DELETEリクエスト などを送るときに、CSRFトークン がないとリクエストを受け付けないようになっている -->

    {{Form::hidden('id',Auth::user()->id)}}
    <!-- ↑フォームを送信するときに、一緒にユーザーのIDを送るための記述。
    <input type="hidden" name="id" value="{{Auth::user()->id}}">の略。-->

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!-- ↑成功メッセージ（Success Message） を表示するためのもの -->

    <!-- ログインユーザーのアイコンの表示 -->
<!-- <img class="update-icon" src="images/icon1.png"> -->
<!-- <img class="update-icon" src="{{ asset('storage/', Auth::user()->icon_image) }}"> -->
 <!-- <figure><img class="update-icon" src="{{ asset( Auth::user()->icon_image) }}"></figure> -->
  <img class="update-icon" src="{{ asset('storage/' . Auth::user()->icon_image) }}">
<div class="update-form">
    <div class="update-block"><!--ユーザー名-->
      <label for="name">User name</label>
      <input type="text" name="username" value="{{Auth::user()->username}}"> <!--ログインユーザーの情報をvalueを使って初期値に設定-->
    </div>
    <div class="update-block"> <!--メールアドレス-->
      <label for="mail">Mail Address</label>
      <!-- <input type="email" name="mail" value="{{Auth::user()->email}}"> -->
       <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
    </div>
    <div class="update-block"> <!--パスワード-->
      <label for="pass">password</label>
      <input type="password" name="password" value="">
      <!-- ↑<input type="password">で、パスワードを伏せ字にすることができる。
      セキュリティ対策のため、初期値valueには何も入れないこと。 -->
    </div>
    <div class="update-block"> <!--パスワード確認用-->
      <label for="name">Password Confirm</label>
      <input type="password" name="password_confirmation" value="">
    </div>
    <div class="update-block"> <!--自己紹介文（任意）-->
      <label for="bio">Bio</label>
      <textarea name="bio">{{ Auth::user()->bio }}</textarea>
    </div>
    <!-- アイコン画像 -->
<div class="update-block">
     <label for="name">icon image</label>
    <input type="file" name="icon_image" accept="image/*">

    <button type="submit">更新</button>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 <!--アイコン画像アップロード（任意）-->
    <!-- <div class="update-block">
      <label for="name">icon image</label>
      <input type="file" name="images">

      <button type="submit">更新</button>
    </div> -->

    <!-- <input type="submit" class="btn btn-danger"> ボタン押したらデータが更新されるページへ行くログインしているユーザーのIDを取得 -->

    <!-- {{Form::token()}} -->
    <!-- ↑フォームでデータを送信するときに、CSRF攻撃対策をするための記述。これがないと、ララベルが拒否してエラーが出る。
     ※ただ！！Laravel９では@csrfで記述するのが一般的のため、フォームタグの最初に書いてみた！-->
    {!! Form::close() !!}
  <!-- ↑フォームを閉じるための記述で、</form>と同じ意味。 -->

  </div>
  </div>
</div>

</x-login-layout>
