<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{

    //follow.bladeのアイコンリスト、投稿リストの表示
    public function followList(Post $post, User $user, Follow $follower){


        $following_id = Auth::user()->followed()->pluck('followed_id');//フォローしているユーザーのidを取得
        $following_users = User::orderBy('created_at', 'desc')->whereIn('id', $following_id)->get(); //userテーブルuser_idとフォローしているユーザーidが一致している投稿を取得
        $posts = Post::orderBy('created_at', 'desc')->with('user')->whereIn('user_id', $following_id)->get(); //Postテーブルuser_idとふぉろーしているユーザーidが一致している投稿を取得
        return view('follows.followList', compact('following_users', 'posts'));
    }


     //follower.bladeのアイコンリスト、投稿リストの表示
    public function followerList(){

        $followed_id = Auth::user()->following()->pluck('following_id');//フォローしているユーザーのidを取得
        $followed_users = User::orderBy('created_at', 'desc')->whereIn('id', $followed_id)->get(); //userテーブルuser_idとフォローしているユーザーidが一致している投稿を取得
        $posts = Post::orderBy('created_at', 'desc')->with('user')->whereIn('user_id', $followed_id)->get(); //Postテーブルuser_idとふぉろーしているユーザーidが一致している投稿を取得
        return view('follows.followerList', compact('followed_users', 'posts'));

    }


    public function follow(User $user)
    {
        $follower = Auth::User();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following)
        {
            // フォローしていなければフォローする
            $follower->follow($user->id);

            return back();
        }
    }

        public function unfollow(User $user)
        {
            $follower = Auth::User();
            $is_following = $follower->isFollowing($user->id);
        if($is_following)
        {
            // フォローしていたら解除する
            $follower->unfollow($user->id);
            return back();
        }

        }

        public function show(User $user, Follow $follow)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);

        return view('users.show', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
}
