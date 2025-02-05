<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class ProfileController extends Controller
{
    public function profile(){
        return view('profiles.profile');
    }

    public function updateProfile(Request $request) {
    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'nullable|min:8|confirmed', // 🔹 パスワード確認用 `confirmed` を追加！
        'bio' => 'nullable|string|max:500',
        'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーション
    ]);

    // 送信後、username,mail,passwordが格納される
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');


    $user = Auth::user();

    // 画像のアップロード処理
    if ($request->hasFile('icon_image')) {
        // 既存のアイコンを削除
        if ($user->icon_image) {
            Storage::delete('public/' . $user->icon_image);
        }

        // 画像を保存
        $iconPath = $request->file('icon_image')->store('icons', 'public');
    } else {
        // 画像がアップロードされなかった場合は、元の画像をそのまま
        $iconPath = $user->icon_image;
    }

    // 🔹 パスワードが入力されたときだけ更新（空なら変更しない）
    $user->update([
        'username' => $request->username,
        'email' => $request->email,
        'bio' => $request->bio,
        'icon_image' => $iconPath, // 🔹 画像のパスを保存
        'password' => $request->password ? Hash::make($request->password) : $user->password,
    ]);

    return redirect()->back()->with('success', 'プロフィールを更新しました！');
}

}
