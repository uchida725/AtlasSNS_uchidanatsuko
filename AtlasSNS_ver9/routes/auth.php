<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FollowsController;

// ログアウト中のページ

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/added', [RegisteredUserController::class, 'added']);
    Route::post('/added', [RegisteredUserController::class, 'added']);

});

// ログイン中のページ

Route::group(['middleware' => 'auth'], function () {

    // トップページへ
// Route::get('/top', [PostsController::class, 'index']);//取得するため
// Route::post('/top', [PostsController::class, 'index']);//指定のルートへ

//投稿機能画面
Route::get('post/create', [PostsController::class, 'index']);
Route::post('post/create', [PostsController::class, 'postCreate']);
// 投稿更新
Route::post('/post/update', [PostsController::class, 'postUpdate']);
// 削除
Route::get('/post/{id}/delete', [PostsController::class, 'delete']);


// プロフィール画面の表示
Route::get('users/profile', [ProfileController::class, 'profile'])->name('profile');
// プロフィールを更新させる
Route::post('users/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');

// // ユーザー検索ページへ
Route::get('/search', [UsersController::class, 'index'])->name('search');
Route::post('/search', [UsersController::class, 'index']);



//     Route::post('/follow-list', [PostsController::class, 'followList']);
//     Route::post('/follower-list', [PostsController::class, 'followerList']);


// フォロー・フォロワー
// Route::post('/users/{user}/follow', [FollowsController::class, 'follow'])->name('follow');
// Route::post('/users/{user}/unfollow', [FollowsController::class, 'unfollow'])->name('unfollow');
Route::post('/follow/{user}', [FollowsController::class, 'follow'])->name('follow');
Route::delete('/unfollow/{user}', [FollowsController::class, 'unfollow'])->name('unfollow');


//     // ログアウト
Route::get('/logout', [AuthenticatedSessionController::class, 'logout']);

// フォロー、フォロワーページへ
// Route::get('/follow-list', [FollowsController::class, 'followList'])->name('follow.list');
//     Route::get('/follower-list', [FollowsController::class, 'followerList']);
 });
