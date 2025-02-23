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

    // 投稿機能
    // public function create(Request $request)
    // {
    //     $id = Auth::id();//ログインユーザーidの取得
    //     $post = $request->input('newPost');//つぶやきを取得
    //     Post::get('posts')->insert([//postテーブルに送る
    //         'post' => $post,//postカラムを$postに入れる
    //         'user_id' => $id//user_idカラムを$idに入れる
    //     ]);

    //     return redirect('/top');
    // }

    public function postCreate(Request $request)
    {
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
