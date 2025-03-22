<x-login-layout>
  <div class="profile-container">
     {!! Form::open(['url' => '/profile', "enctype" => "multipart/form-data"]) !!}
    @csrf
    {{Form::hidden('id',Auth::user()->id)}}

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="profile-content">
  <div class="profile-left">
  <img class="update-icon" src="{{ asset('storage/' . Auth::user()->icon_image) }}"width="50" height="50">
</div>

<div class="update-form">
     <!--ユーザー名-->
    <div class="update-block">
      <label for="name">ユーザー名</label>
      <input type="text" name="username" value="{{Auth::user()->username}}">
    </div>

     <!--メールアドレス-->
    <div class="update-block">
      <label for="mail">メールアドレス</label>
       <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
    </div>

    <!--パスワード-->
    <div class="update-block">
      <label for="pass">パスワード</label>
      <input type="password" name="password" value="">
    </div>

    <!--パスワード確認用-->
    <div class="update-block">
      <label for="name">パスワード確認</label>
      <input type="password" name="password_confirmation" value="">
    </div>

    <!--自己紹介文（任意）-->
    <div class="update-block">
      <label for="bio">自己紹介</label>
      <textarea name="bio">{{ Auth::user()->bio }}</textarea>
    </div>

    <!-- アイコン画像 -->
<div class="update-block">
     <label for="name">アイコン画像</label>
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
    {!! Form::close() !!}
  </div>

</div>

  </div>

</x-login-layout>
