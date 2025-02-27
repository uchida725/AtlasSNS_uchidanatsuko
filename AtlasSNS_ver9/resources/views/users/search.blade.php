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

@foreach ($users as $users)
<div>
  <tr>
    <td>
      <img src="storage/{{ $users -> images }}" alt="icon" class="icon-space">
    </td>
    <td>{{ $users -> username }}</td>
    <td>
      @if(Auth::user()->isFollowing($users->id))
      <form action="{{ route('unfollow', $users->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">フォロー解除</button>
      </form>
      @else
      <form action="{{ route('follow',$users->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">フォローする</button>
      </form>
      @endif
    </td>
  </tr>
</div>
@endforeach
</x-login-layout>
