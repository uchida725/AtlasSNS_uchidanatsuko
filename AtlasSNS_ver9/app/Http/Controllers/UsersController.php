<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// チャットGPT補足
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
// use宣言・・・中で使うクラス（Auth）の宣言。
// このファイルではIlluminate\Support\Facadesフォルダの中にあるAuthクラスを使用すると宣言している。
// この宣言をしておけばこのファイル内においてAuthと書くだけでAuthクラスを呼び出せる。
// ちなみに、Controller>Authの中のphpファイルたちには、みんなこのuse宣言が入っている。

// use App\User;
// App というフォルダ（名前空間）の中に User というクラス がある、という意味。たぶんバリデーションのときに必要？？？

Use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;






class UsersController extends Controller
{


// public function updateProfile(Request $request) {
//     $request->validate([
//         'username' => 'required|string|max:255',
//         'email' => 'required|email|max:255',
//         'password' => 'nullable|min:8|confirmed', // 🔹 パスワード確認用 `confirmed` を追加！
//         'bio' => 'nullable|string|max:500',
//         'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーション
//     ]);

//     $user = Auth::user();

//     // 画像のアップロード処理
//     if ($request->hasFile('icon_image')) {
//         // 既存のアイコンを削除
//         if ($user->icon_image) {
//             Storage::delete('public/' . $user->icon_image);
//         }

//         // 画像を保存
//         $iconPath = $request->file('icon_image')->store('icons', 'public');
//     } else {
//         // 画像がアップロードされなかった場合は、元の画像をそのまま
//         $iconPath = $user->icon_image;
//     }

//     // 🔹 パスワードが入力されたときだけ更新（空なら変更しない）
//     $user->update([
//         'username' => $request->username,
//         'eemail' => $request->mail,
//         'bio' => $request->bio,
//         'icon_image' => $iconPath, // 🔹 画像のパスを保存
//         'password' => $request->password ? Hash::make($request->password) : $user->password,
//     ]);

//     return redirect()->back()->with('success', 'プロフィールを更新しました！');
// }






//     //プロフィール画面の表示
//     public function profile(){
//         return view('users.profile');
//     }


// // 検索フォーム用(投稿フォーム参考)
//     public function search(Request $request){

//         $user = Auth::user();

//         // 検索フォームで入力した値の取得
//         $keyword = $request->input('users');

//         return view('users.search');
//     }

// // 入力フォームのバリデーション
// public function test(Request $request){

//     $rules = [

//     ];

//     $this->validate($request, $rules);
// }


// //    プロフィール編集機能
// public function updateProfile(Request $request)
// {

//      if($request->isMethod('post')){
//         $rulus =[
//             'username'=>'required|min:2|max:12',
//             'email'=>'required|email|min:5|max:40|unique:users',
//             'password'=>'required|alpha_dash|min:8|max:20|confirmed|string',
//             'password_comfirmation'=>'required|alpha_dash|min:8|max:20|confirmed|string',
//             'bio'=>'max:150',
//             'images'=>'image|alpha_dash|mimes:jpq,png,bmp,gif,svg',
//         ];

//         $message = [
//             'username.required'=>'ユーザー名を入力してください',
//             'username.min'=>'ユーザー名は2文字以上、12文字以下で入力してください',
//             'username.max'=>'ユーザー名は2文字以上、12文字以下で入力してください',
//             'email.required'=>'メールアドレスを入力してください',
//             'password.alpha_num'=>'パスワードは半角英数字で入力してください',
//             'images.alpha_dash'=>'ファイル名は英数字のみです',
//             'images.mimes'=>'指定されたファイルではありません'

//         ];

//         $validator = validator::make($request->all(),$rulus, $message);

//         if($validator->fails()){
//             return redirect('/profile')
//             ->withErrors($validator)
//             ->withInput();
//         }

//         $user = Auth::user();//更新の処理。ログインユーザーの取得。
//         $id = Auth::id();//ログインしているユーザーidの取得。
//         $validator -> validate();


//         // 画像登録
//         $image = $request->file('images')->getClientOriginalName();
//         if($image != null){
//             $image->store('public/images');
//             \DB::table('users')
//             ->where('id',$id)
//             ->update([
//                 'images' => basename($image),

//             ]);
//         }

//     $id = $request->input('id');
//     $username = $request->input('username');
//     $mail = $request->input('email');
//     $password = $request->input('password');
//     $bio = $request->input('bio');
//     $icon = $request->input('icon_image');

//     User::where('id', $id)->update([[

//         'username' => $username,
//         'mail' => $mail,
//         'password'=> Hash::make($request->password),
//         'bio' => $bio,
//     ]]);

//     // User::where('id','$id')->update([[
//     //     'username' => 'りんご',
//     //     'email' => 'ringo@gmail.com',
//     //     'password' => 'bcrypt',
//     //     'bio' => 'よろしくお願いします',
//     //     'images' => 'icon',
//     // ]]);
// dd($update);



//     return redirect('/top');

    //  }
    // }
}
