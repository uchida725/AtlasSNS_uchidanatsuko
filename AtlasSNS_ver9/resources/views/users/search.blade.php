<x-login-layout>
<div class="follow-container">
{!! Form::open(['url' => '/search', 'class' => 'post-form']) !!}
{{ Form::input('text', 'searchWord', null, ['required', 'class' => 'search', 'placeholder' => 'ユーザー名']) }}
<button type="submit">
  <img src="images/search.png" width="40" height="40"></button>
@if(!empty($searchWord))

<div class="search-word">
  検索ワード:{{ $searchWord }}
</div>

@endif
{!! Form::close() !!}
</div>
<div class="under-line"></div>


@foreach ($users as $user)
<!-- ↓自分以外のユーザーだけ表示させるif文。foreachと同じように<div>の外で記入した -->
@if ($user->id !== Auth::user()->id)

  <div class="search-list">
    <div class="icon-space">
       <img src="{{ asset('storage/' . $user->icon_image) }}" alt="icon">
    </div>
    <div class="search-name">
      {{ $user -> username }}
    </div>
    <div class="search-follow-button">
      @if(Auth::user()->isFollowing($user->id))
      <form action="{{ route('unfollow', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">フォロー解除</button>
      </form>
      @else
      <form action="{{ route('follow', $user->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">フォローする</button>
      </form>
      @endif
    </div>
  </div>
@endif
@endforeach
</x-login-layout>
