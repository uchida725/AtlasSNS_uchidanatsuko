<x-login-layout>
<div class="follow-container">
  <div class="follow-text">フォロワーリスト</div>
      {!! Form::open(['url' => '/follower-list']) !!}
      @foreach($followed_users as $followed_user)
@if($followed_user->id !== Auth::user()->id)

<a href="{{ url('users/profile',$followed_user->id )}}">
  <img src="{{ asset('storage/'.$followed_user->icon_image) }}" class="" width="50" heigh="50" heigh="50">
</a>
@endif
@endforeach
</div>
<div class="under-line"></div>


@foreach($posts as $post)
<div class="left-list">
  <div class="up-time">
    {{ $post->user->created_at}}
  </div>
  <div class="icon-name">
    <a href="{{ url('users/profile',$post->user->id) }}">
    <img src="{{ asset('storage/'.$post->user->icon_image) }}" class="" width="50" height="50">
    </a>
    <div class="post-username">
      {{ $post->user->username}}
    </div>
  </div>
     <div class="post-user">
      {{ $post->post}}
     </div>
</div>
@endforeach


</x-login-layout>
