<x-login-layout>

<div class="others-container">

    <div class="follow-posts">
        <div class="profile">
            <div class="list-images">
                    <img src="{{ asset('storage/' . $data->icon_image) }}" alt="icon" alt="" width="50" height="50" class="list-icon">
            </div>
            <div class="usersProfile">
                <div></div>
                <p class="profileName">ユーザー名</p>
                <p class="profileBio">自己紹介</p>
            </div>
            <div class="profile-up">
                <p>{{$data->username}}</p>
                <p>{{$data->bio}}</p>
            </div>


{{-- フォローボタンの実装 --}}
<div class="other-follow-btn">
    @if(Auth::user()->isFollowing($data->id))

        <form action="{{ route('unfollow', $data->id) }}" method="POST">
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-danger">フォロー解除</button>
        @else

        <form action="{{ route('follow', $data->id)  }}" method="POST">
        @csrf
            <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
        @endif
</div>

</div>
</div>
</div>

        <div class="under-line"></div>

        @foreach ($dataPost as $dataPost)
        @csrf
        <div class="left-list">
            <div class="up-time">
                {{$dataPost->created_at}}
            </div>
            <div class="icon-name">
                    <img src="{{ asset( 'storage/' . $data->icon_image)}}" alt="" width="50" height="50" class="list-icon">
                <div class="post-username">
                {{$dataPost->user->username}}
                </div>
            </div>

                <div class="post-user">
                    {{$dataPost->post}}
                </div>
                </div>
            @endforeach



</x-login-layout>
