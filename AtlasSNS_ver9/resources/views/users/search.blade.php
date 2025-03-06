<x-login-layout>

{!! Form::open(['url' => '/search', 'class' => 'post-form']) !!}
{{ Form::input('text', 'searchWord', null, ['required', 'class' => 'search', 'placeholder' => 'ユーザー名']) }}
<button type="submit"><img src="images/search.png" width="40" height="40"></button>
@if(!empty($searchWord))
<div class="search-word">
  検索ワード:{{ $searchWord }}
</div>
@endif
{!! Form::close() !!}

@foreach ($users as $user)
<!-- ↓自分以外のユーザーだけ表示させるif文。foreachと同じように<div>の外で記入した -->
@if ($user->id !== Auth::user()->id)
<div>
  <tr>
    <td>
       <img src="{{ asset('storage/' . $user->icon_image) }}" alt="icon" class="icon-space">
    </td>
    <td>{{ $user -> username }}</td>
    <td>
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
    </td>
  </tr>
</div>
@endif
@endforeach
</x-login-layout>
