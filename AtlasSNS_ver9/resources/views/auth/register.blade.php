<x-logout-layout>
<section class="login-container">
  <div class="login-card">

{!! Form::open(['url' => '/register']) !!}


<p class="welcome">新規ユーザー登録</p>


<!-- ↓バリデーションに引っ掛かった時に、ビューファイルにエラーメッセージが出るように設定 -->
    @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif
<div class="input-group">
  {{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
</div>


<div class="input-group">
  {{ Form::label('メールアドレス') }}
{{ Form::email('email',null,['class' => 'input']) }}
</div>

<div class="input-group">
  {{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}
</div>

<div class="input-group">
  {{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
</div>

<div class="button-container">
  {{ Form::submit('新規登録', ['class' => 'login-button']) }}
</div>


<p class="register-link"><a href="login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}

  </div>
</section>

</x-logout-layout>
