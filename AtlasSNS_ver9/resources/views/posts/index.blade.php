<x-login-layout>
<div class="container">
<!-- <p class="page-header"><img src="images/icon1.png"width="50"height="50"></p> -->
{!! Form::open(['url' => '/post/create']) !!}
<!-- ↓バリデーションのエラーメッセージ -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
  <p class="page-header"><img src="images/icon1.png"width="50"height="50"></p>
  {{ Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) }}
</div>
<button type="submit" class="btn btn-success pull-right"><img src="images/post.png"width="50"height="50" alt="送信"></button>
{!! Form::close() !!}
</div>
<div>
  @foreach ($list as $list)
<div class="list">
  <div class="left-list">
    <div class="up-time">{{$list->created_at}}</div>
    <div class="icon-name">
      <img class="form-icon" src="images/icon1.png" width="35" height="35">
    <div class="post-username">{{ $list->user->username }}</div>
  </div>
  <div class="post-user">
    <div>{{$list->post}}</div>
</div>
   <div>
    <div class="contents">
    <!-- 編集用 -->
    <a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}">
      <img class="update_image" src="./images/edit.png" alt="編集">
  </a>
    <!-- 消去用 -->
    <a class="delete_btn" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいですか？')">
    <img src="./images/trash-h.png" alt="ホバー中消去">
    <img src="./images/trash.jpeg" alt="消去">
  </a>
   </div>
  </div>
</div>
  </div>
@endforeach
</div>

<!-- モーダルの中身 -->
 <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/post/update" method="post">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
</x-login-layout>
