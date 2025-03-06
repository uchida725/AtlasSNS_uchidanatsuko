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
        $query = User::query();


        if(!empty($searchWord)) {
            $query->where('username', 'LIKE', "%{$searchWord}%");
        }

        $users = $query->get();

        return view('users.search', compact('users', 'searchWord'));

    }
}
