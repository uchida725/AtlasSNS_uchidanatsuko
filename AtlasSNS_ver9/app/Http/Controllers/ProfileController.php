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
        // dd($request);
        // バリデーションメッセージを先に書く。その後に、処理を書くことで、第２引数の$messageが処理される！
        $message = [
            'username.required' => 'ユーザー名を入力してください',
            'username.min' => 'ユーザー名は2文字以上、12文字以下で入力してください',
            'username.max' => 'ユーザー名は2文字以上、12文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.min' => 'メールアドレスは5文字以上、40文字以下で入力してください',
            'email.max' => 'メールアドレスは5文字以上、40文字以下で入力してください',
            'password.alpha_num' => 'パスワードは半角英数字で入力してください',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.confirmed' => 'パスワードが一致しません',
            'bio.max'=>'紹介文は150文字以内で入力してください',
            'images.alpha_dash' => 'ファイル名は英数字のみです',
            'images.mimes' => '指定されたファイルではありません'
        ];


    // $request->validate([
    //     'username' => 'required|string|min:2|max:12',
    //     'email' => 'required|email',
    //     'password' => 'nullable|min:8|confirmed', // 🔹 パスワード確認用 `confirmed` を追加！
    //     'bio' => 'nullable|string|max:100',
    //     'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーション
    // ], $message); //←第二引数にエラーメッセージを渡す記述



    $validatedData = $request->validate([
            'username' => 'required|string|min:2|max:12',
            'email' => 'required|email|min:5|max:40',
            'password' => 'nullable|alpha_num|min:8|max:20|confirmed',
            // 'password_confirmation' => 'required|alpha_num|min:8|max:20',
            'bio' => 'nullable|string|max:150',
            'images' => 'mimes:jpg,png,bmp,gif,svg',
        ], $message);


    //   try {
    //     $validatedData = $request->validate([
    //         'username' => 'required|string|min:2|max:12',
    //         'email' => 'required|email|min:5|max:40',
    //         // 'password' => 'nullable|alpha_num|min:8|max:20|confirmed',
    //         'bio' => 'nullable|string|max:150',
    //         // 'images' => 'nullable|alpha_dash|mimes:jpg,png,bmp,gif,svg',
    //     ], $message);

    //     // 🔹 デバッグ用にバリデーション成功データをログに出す
    //     \Log::info('Validation successful:', $validatedData);

    //     return redirect()->back()->with('success', 'プロフィールが更新されました！');

    // } catch (ValidationException $e) {
    //     // 🔥 エラーメッセージを取得
    //     \Log::error('Validation failed:', $e->errors());

    //     return redirect()->back()->withErrors($e->errors())->withInput();
    // }

if ($request->hasFile('icon_image')) {
    $file = $request->file('icon_image');
    $path = $file->store('icons', 'public');
    Auth::user()->update(['icon_image' => $path]);
}


    // 送信後、username,mail,passwordが格納される
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $iconPath = $request->input('icon_image');
        // dd($username);


    $user = Auth::user();

    // // 画像のアップロード処理
    // if ($request->hasFile('icon_image')) {
    //     // 既存のアイコンを削除
    //     if ($user->icon_image) {
    //         Storage::delete('public/' . $user->icon_image);
    //     }

    //     // 画像を保存
    //     $iconPath = $request->file('icon_image')->store('icons', 'public');
    // } else {
    //     // 画像がアップロードされなかった場合は、元の画像をそのまま
    //     $iconPath = $user->icon_image;
    // }

    // 🔹 パスワードが入力されたときだけ更新（空なら変更しない）
    $user->update([
        'username' => $request->username,
        'email' => $request->email,
        'bio' => $request->bio,
        'icon_image' => $iconPath, // 🔹 画像のパスを保存
        'password' => $request->password ? Hash::make($request->password) : $user->password,
    ]);
    // dd($iconPath);

    return redirect()->back()->with('success', 'プロフィールを更新しました！');
}
}
