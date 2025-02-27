<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Follow extends Model
{
    use HasFactory;

    // 中間テーブルでフォロー機能
    protected $fillable =['user_id', 'follower_id'];
}
