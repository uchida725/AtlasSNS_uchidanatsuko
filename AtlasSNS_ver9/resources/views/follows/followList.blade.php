<x-login-layout>
{!! Form::open(['url' => '/follow-list']) !!}
フォローリスト

@foreach($following_users as $following_user)
@if($following_user->id !== Auth::user()->id)

<a href="{{ url('users/profile',$following_user->id )}}">
  <img src="{{ asset('storage/'.$following_user->icon_image) }}" class="" width="50" heigh="50" heigh="50"></a>
@endif
@endforeach


@foreach($posts as $post)
<div><a href="{{ url('users/profile',$post->user->id) }}"><img src="{{ asset('storage/'.$post->user->icon_image) }}" class="" width="50" height="50"></a><br>{{ $post->user->username}}</br>
<br>{{ $post->user->created_at}}</br>
<br>{{ $post->post}}</br>
</div>
@endforeach


</x-login-layout>
