<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        return view('users.search',['users' => $users, 'searchWord' => $searchWord]);

    }
}
