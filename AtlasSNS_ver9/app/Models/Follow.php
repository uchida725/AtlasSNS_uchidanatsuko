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


    //フォローリスト
    public function followingIds($user_id)
    {
        return $this->where('following_id', $user_id)->get();
    }


    public function getFollowCount($user_id)
  {
      return $this->where('following_id', $user_id)->count();
  }

  public function getFollowerCount($user_id)
  {
      return $this->where('followed_id',  $user_id)->count();
  }

}
