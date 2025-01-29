<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
//    プロフィール編集機能
public function updateProfile(Request $request)
{
    $id = $request->inpput('id');
    $username = $request->input('username');
    $mail = $request->input('mail');
    $password = $request->input('password');
    $bio = $request->input('bio');

    User::where('id', $id)->update([
        'username' => $username,
        'mail' => $mail,
        'password'=> Hash::make($request->password),
        'bio' => $bio,
    ]);

    return redirect('/top');
}


    //
    public function search(){
        return view('users.search');
    }
}
