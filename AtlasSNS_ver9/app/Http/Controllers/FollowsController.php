<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{

    public function followList(){
        // $users = User::get();
        // $followList = $request -> input('followList');
        return view('follows.followList');
    }


    public function followerList(){
        return view('follows.followerList');
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
    }
