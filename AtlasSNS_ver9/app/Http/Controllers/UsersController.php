<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;



class UsersController extends Controller
{

    // public function index()
    // {
    //     return view('users.search');
    // }



    public function index(Request $request)
    {
        $users = User::get();
        $searchWord = $request -> input('searchWord');
        $query = User::query();


        if(!empty($searchWord)) {
            $query->where('username', 'LIKE', "%{$searchWord}%");
        }

        $users = $query->get();

        return view('users.search', compact('users', 'searchWord'));

    }

    public function follow(User $data)
    {
        $follower = Auth::User();
        // フォローしているか
        $is_following = $follower->isFollowing($data->id);
        if(!$is_following)
        {
            // フォローしていなければフォローする
            $follower->follow($data->id);

            return back();
        }
    }

        public function unfollow(User $data)
        {
            $follower = Auth::User();
            $is_following = $follower->isFollowing($data->id);
        if($is_following)
        {
            // フォローしていたら解除する
            $follower->unfollow($data->id);
            return back();
        }

        }

    //相手ユーザーのプロフィール画面へ
    public function show($id)
    {
        //特定のユーザーをデータベースから取得
        // $user = User::findOrFail($id);

        $data = User::find($id);
        $dataPost = Post::with('user')->whereIn('user_id', $data)->latest()->get();

        return view('profiles.otherProfile', compact('data', 'dataPost'));
    }
}
