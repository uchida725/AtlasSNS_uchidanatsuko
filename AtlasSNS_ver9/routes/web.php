<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



require __DIR__ . '/auth.php';

// Route::get('top', [PostsController::class, 'index']);

// Route::get('profile', [ProfileController::class, 'profile']);

// Route::get('search', [UsersController::class, 'index']);

// Route::get('follow-list', [PostsController::class, 'index']);
// Route::get('follower-list', [PostsController::class, 'index']);



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


Route::get('top', [PostsController::class, 'index']);

Route::get('profile', [ProfileController::class, 'profile']);

// プロフィール画面の表示
Route::get('users/profile', [ProfileController::class, 'profile'])->name('profile');
// プロフィールを更新させる
Route::post('users/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');

//他ユーザーのプロフィール画面へ
Route::get('users/profile/{id}', [UsersController::class, 'show'])->name('profile.show');
Route::delete('users/profile/{id}', [UsersController::class,'unfollow']);


// // ユーザー検索ページへ
Route::get('/search', [UsersController::class, 'index'])->name('search');
Route::post('/search', [UsersController::class, 'index']);



Route::post('/follow-list', [PostsController::class, 'followList']);
//     Route::post('/follower-list', [PostsController::class, 'followerList']);


// フォロー・フォロワー
Route::post('/follow/{user}', [FollowsController::class, 'follow'])->name('follow');
Route::delete('/unfollow/{user}', [FollowsController::class, 'unfollow'])->name('unfollow');


// ログアウト
Route::get('/logout', [AuthenticatedSessionController::class, 'logout']);

// フォローページへ
Route::get('/follow-list', [FollowsController::class, 'followList']);
Route::post('/follow-list', [FollowsController::class, 'followList']);

// フォロワーーページへ
Route::get('/follower-list', [FollowsController::class, 'followerList']);
Route::post('/follower-list', [FollowsController::class, 'followerList']);
 });
