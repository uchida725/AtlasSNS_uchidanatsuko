<x-logout-layout>

<section class="login-container">
    <div class="login-card">
      <p class="welcome">AtlasSNSへようこそ</p>

      {!! Form::open(['url' => '/login']) !!}

      <div class="input-group">
        {{ Form::label('email', 'メールアドレス') }}
        {{ Form::text('email', null, ['class' => 'input']) }}
      </div>

      <div class="input-group">
        {{ Form::label('password', 'パスワード') }}
        {{ Form::password('password', ['class' => 'input']) }}
      </div>

      <div class="button-container">
        {{ Form::submit('ログイン', ['class' => 'login-button']) }}
      </div>

      <p class="register-link"><a href="register">新規ユーザーの方はこちら</a></p>

      {!! Form::close() !!}
    </div>
  </section>
</x-logout-layout>
