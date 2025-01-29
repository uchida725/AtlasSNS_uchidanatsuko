<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;


// ログアウト中のページ

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthenticatedSessionController::class, 'create']);
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/added', [RegisteredUserController::class, 'added']);
    Route::post('/added', [RegisteredUserController::class, 'added']);

});

// ログイン中のページ

Route::group(['middleware' => 'auth'], function () {

    // トップページへ
Route::get('/top', [PostsController::class, 'index']);//取得するため
Route::post('/top', [PostsController::class, 'index']);//指定のルートへ

//     // プロフィール編集ページへ
Route::get('/profile', [UsersController::class, 'updateProfile']);

// // ユーザー検索ページへ
//     Route::get('/search', [UsersController::class, 'search']);

//     Route::post('/follow-list', [PostsController::class, 'followList']);
//     Route::post('/follower-list', [PostsController::class, 'followerList']);

//     // ログアウト
//     Route::get('/logout', [PostsController::class, 'logout']);

//     // フォロー、フォロワーページへ
//     Route::get('/follow-list', [FollowsController::class, 'followList']);
//     Route::get('/follower-list', [FollowsController::class, 'followerList']);
 });
