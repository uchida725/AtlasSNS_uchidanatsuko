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
    //  profiles.profile というビュー（画面）を表示するだけ！
    public function profile(){
        return view('profiles.profile');
    }


    // プロフィール情報を更新する処理 ↓
    public function updateProfile(Request $request) {
        // dd($request);
        // バリデーションメッセージを先に書く。その後に、処理を書くことで、第２引数の$messageが処理される！
        // 🔹 エラーメッセージを設定（「この入力が間違ってたら、こういうメッセージを出すよ！」というルールを決める）↓
        $message = [
            'username.required' => 'ユーザー名を入力してください',
            'username.min' => 'ユーザー名は2文字以上、12文字以下で入力してください',
            'username.max' => 'ユーザー名は2文字以上、12文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.min' => 'メールアドレスは5文字以上、40文字以下で入力してください',
            'email.max' => 'メールアドレスは5文字以上、40文字以下で入力してください',
            'password.required' => 'パスワードを入力してください(※半角英数字・8〜20文字以内)',
            // 'password.alpha_num' => 'パスワードは半角英数字で入力してください',
            // 'password.min' => 'パスワードは8文字以上で入力してください',
            'password.confirmed' => 'パスワードが一致しません',
            'bio.max'=>'紹介文は150文字以内で入力してください',
            'images.alpha_dash' => 'ファイル名は英数字のみです',
            'images.mimes' => '指定されたファイルではありません'
        ];




    // 🔷バリデーションルール
        $validatedData = $request->validate([
            'username' => 'required|string|min:2|max:12',
            'email' => 'required|email|min:5|max:40',
            'password' => 'required|alpha_num|min:8|max:20|confirmed',
            'password_confirmation' => 'required|alpha_num|min:8|max:20',
            'bio' => 'nullable|string|max:150',
            'images' => 'mimes:jpg,png,bmp,gif,svg',
        ], $message);



// 画像アップロード処理
// もし アイコン画像が送られてきたら、保存する！
if ($request->hasFile('icon_image')) {
    $file = $request->file('icon_image');// 画像ファイルを取得
    $path = $file->store('icons', 'public');// "icons"フォルダに保存
    // store('icons', 'public') は、storage/app/public/icons/ に保存するという意味。
    Auth::user()->update(['icon_image' => $path]);// ユーザーのアイコン画像を更新

}


    // 送信後、username,mail,passwordが格納される
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $iconPath = $request->input('icon_image');
        // dd($username);


    // 🔹 Auth::user() を使って、ログイン中のユーザーの情報 を取得！
    $user = Auth::user();// 今ログインしているユーザーを取得


// ユーザー情報の更新
    $user->update([
        'username' => $request->username,
        'email' => $request->email,
        'bio' => $request->bio,
        // 'icon_image' => $iconPath, // 🔹 画像のパスを保存
        'password' => $request->password ? Hash::make($request->password) : $user->password,
        // 🔹 パスワードが入力されたときだけ更新（空なら変更しない）
        // → Hash::make($request->password) で暗号化して保存する
    ]);
    // dd($iconPath);


    // 🔹 更新が終わったら、元のページに戻ってメッセージを表示！
    return redirect()->back()->with('success', 'プロフィールを更新しました！');

}
}
