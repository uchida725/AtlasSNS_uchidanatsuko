<x-login-layout>
<div class="container">
<p class="page-header"><img src="images/icon1.png"width="50"height="50"></p>
{!! Form::open(['url' => '/post/create']) !!}
<div class="form-group">
  {{ Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) }}
</div>
<button type="submit" class="btn btn-success pull-right"><img src="images/post.png"width="30"height="30" alt="送信"></button>
{!! Form::close() !!}
</div>
<div>
  @foreach ($list as $list)
<tr>
  <td>{{ $list->user_id }}</td>
  <td>{{$list->post}}</td>
  <td>{{$list->created_at}}</td>
  <!-- 更新用 -->
   <td><div class="contents">
    <a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="./images/edit.png" alt="編集"></a>
   </div></td>
   <!-- 消去用 -->
    <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいですか？')"><img src="./images/trash.png" alt="消去"></a></td>
</tr>
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
