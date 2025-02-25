<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
// Auth認証のuse宣言追加↓
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

// トップページ
    public function index()
    {
        $list =Post::orderBy('created_at','desc')->get();
        // $list=Post::get();
        return view('posts.index',['list'=>$list]);
    }

// 投稿の作成
    public function postCreate(Request $request)
    {
        // バリデーション
        $message = [
            'newPost.max' => '投稿文は150文字以内で入力してください',
        ];
        // dd($message);

        $validatedData = $request->validate([
            'newPost' => 'required|min:1|max:150',
        ], $message);


        // dd("123");
        $post=$request->input('newPost');
        $user_id=Auth::user()->id;
        Post::create([
            'user_id'=>$user_id,
            'post'=>$post
        ]);
        // return redirect('/top');
        return back();
    }

    // 投稿の更新
    public function postUpdate(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        Post::where('id',$id)->update(['post'=>$up_post]);
        return redirect('/top');
    }

    // 投稿の削除
    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
