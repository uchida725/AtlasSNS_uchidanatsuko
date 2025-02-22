<x-login-layout>
<div class="container">
<p class="page-header"><img src="images/icon1.png"width="50"height="50"></p>
{!! Form::open(['url' => '/post/create']) !!}
<div class="form-group">
  {{ Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) }}
</div>
<button type="submit" class="btn btn-success pull-right"><img src="images/post.png"width="50"height="50" alt="送信"></button>
{!! Form::close() !!}
</div>
<div>
  @foreach ($list as $list)
<tr>
  <td>{{ $list->user_id }}</td>
  <td>{{$list->post}}</td>
  <td>{{$list->created_at}}</td>
</tr>
@endforeach
</div>
</x-login-layout>
