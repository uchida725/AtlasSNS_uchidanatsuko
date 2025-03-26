<x-login-layout>


<h2>ユーザープロフィール</h2>

<div class="container">

    <section class="follow-posts">
        <div class="profile">
            <div class="list-images">
                    <img src="{{ asset('storage/' . $data->icon_image) }}" alt="icon" alt="" width="50" height="50" class="list-icon">
            </div>
            <div class="usersProfile">
                <p class="profileName">ユーザー名：{{$data->username}}</p>
                <p class="profileBio">自己紹介：{{$data->bio}}</p>
            </div>

{{-- フォローボタンの実装 --}}
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
        <div class="bold-line"></div>
        <div class="post-list">
            <div class="list-images">
                    <img src="{{ asset( 'storage/' . $data->icon_image)}}" alt="" width="50" height="50" class="list-icon">
            </div>
            @foreach ($dataPost as $dataPost)
                <div class="posts">
                    <p>{{$dataPost->user->username}}</p>
                    <p>{{$dataPost->post}}</p>
                    <p>{{$dataPost->updated_at}}</p>
                </div>
            @endforeach
        </div>
    </section>
 </div>
</x-login-layout>
