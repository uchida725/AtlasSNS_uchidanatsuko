<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'bio',
        'icon_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 投稿機能：１対多の「多」側→メソッド複数形（posts）
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    // フォロー機能
    public function following()
    {
        return $this -> belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }

    // フォロー解除
    public function followed()
    {
        return $this -> belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }

    // フォローする
    public function follow(Int $user_id)
    {
        // 上記メソッドとそろえる
        return $this->following()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow($user_id)
    {
        return $this->following()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing($user_id)
    {
        return(boolean) $this->following()->where('followed_id', $user_id)->first();
    }

    // フォローされているか
    public function isFollowed($user_id)
    {
        return(boolean) $this->followed()->where('following_id', $user_id)->first();
    }
}
