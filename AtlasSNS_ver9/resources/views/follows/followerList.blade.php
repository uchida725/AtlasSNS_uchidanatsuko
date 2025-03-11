<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

    {!! Form::open(['url' => '/follower-list']) !!}
フォロワーリスト

@foreach($followed_users as $followed_user)
@if($followed_user->id !== Auth::user()->id)

<a href="{{ url('users/profile',$followed_user->id )}}">
  <img src="{{ asset('storage/'.$followed_user->icon_image) }}" class="" width="50" heigh="50" heigh="50"></a>
@endif
@endforeach


@foreach($posts as $post)
<div><a href="{{ url('users/profile',$post->user->id) }}"><img src="{{ asset('storage/'.$post->user->icon_image) }}" class="" width="50" height="50"></a>
<br>{{ $post->user->username}}</br>
<br>{{ $post->user->created_at}}</br>
<br>{{ $post->post}}</br>
</div>
@endforeach


</x-login-layout>
