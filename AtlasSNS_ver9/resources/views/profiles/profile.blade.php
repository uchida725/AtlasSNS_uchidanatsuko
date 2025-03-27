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
     @if(Auth::user()->icon_image !== 'icon1.png')
 <p class="up-icon"><img src="{{ asset('storage/' . Auth::user()->icon_image) }}" width="50" height="50">
</p>
@else
   <img src="{{ asset('images/icon1.png') }}" alt="初期アイコン" class="up-icon" width="50" height="50">
@endif

</div>
<div class="update-form">
     <!--ユーザー名-->
    <div class="update-block">
      <div class="up-title">
        ユーザー名
      </div>
      <div class="up-form">
        <input type="text" name="username" value="{{Auth::user()->username}}" class="profile-form">
      </div>
    </div>

     <!--メールアドレス-->
    <div class="update-block">
      <div class="up-title">
        メールアドレス
      </div>
       <div class="up-form">
        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required class="profile-form">
      </div>
    </div>

    <!--パスワード-->
    <div class="update-block">
      <div class="up-title">
        パスワード
      </div>
      <div class="up-form">
        <input type="password" name="password" value="" class="profile-form">
      </div>
    </div>

    <!--パスワード確認用-->
    <div class="update-block">
      <div class="up-title">
        パスワード確認
      </div>
      <div class="up-form">
        <input type="password" name="password_confirmation" value="" class="profile-form">
      </div>
    </div>

    <!--自己紹介文（任意）-->
    <div class="update-block">
      <div class="up-title">
        自己紹介
      </div>
      <div class="up-form">
        <textarea name="bio" class="profile-form">{{ Auth::user()->bio }}</textarea>
      </div>
    </div>

    <!-- アイコン画像 -->
<div class="update-block">
     <div class="icon-up-title">
      アイコン画像
    </div>
    <div class="up-form">
      <input type="file" name="icon_image" accept="image/*" class="icon-profile-form">
    </div>
</div>

<div>
  <!-- <button type="submit">更新</button> -->
   {{ Form::submit('更新', ['class' => 'update-button']) }}
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
