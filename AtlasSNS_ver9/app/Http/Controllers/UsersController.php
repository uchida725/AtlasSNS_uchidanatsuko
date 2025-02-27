<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;




class UsersController extends Controller
{

    public function index()
    {
        return view('users.search');
    }



    public function search(Request $request)
    {
        $users = Auth::user();// 今ログインしているユーザーを取得
        // $users = User::get();
        $searchWord = $request -> input('searchWord');
        return view('users.search',['users' => $users, 'searchWord' => $searchWord]);

    }
}
