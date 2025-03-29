<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        //バリデーション設定
        $request->validate([
              'username' => 'required|min:2|max:12',
              'email' => 'required|string|email:strict,dns|min:5|max:40|unique:users,email',
              'password' => 'required|alpha_num|min:8|max:20|confirmed',
              'password_confirmation' => 'required|alpha_num|min:8|max:20',
        ]);
        //ここまで

        // 送信後、username,mail,passwordが格納される
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');



        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // セッションを使用してユーザー名を表示させる
        $user = $request->get('username');
        return redirect('added')->with('username', $user);

    }

    public function added(): View
    {
        return view('auth.added');
    }
}
