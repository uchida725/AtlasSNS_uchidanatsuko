<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post'];


    // ユーザーが投稿した内容を取得
    // リレーション１対多の「１」側なので単数系
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
