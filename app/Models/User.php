<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'screen_name',
        'name',
        'profile_image',
        'email',
        'password'
    ];

    public function followers() {
        return $this->belongsToMany(self::class, 'followers', 'followed_id', 'following_id');
    }

    public function follows() {
        return $this->belongsToMany(self::class, 'followers', 'following_id', 'followed_id');
    }

    /**
     * ログインユーザー以外のユーザーを1ページにつき5人ずつ取得
     * @param Int $user_id
     * @return mixed
     */
    public function getAllUsers(int $user_id) {
        return $this->Where('id', '<>', $user_id)->paginate(5);
    }

    // フォローする
    public function follow(int $user_id) {
        // 多対多の中間テーブルへのデータの追加（insertの操作）
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(int $user_id) {
        // 多対多の中間テーブルからデータを削除（deleteの操作）
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(int $user_id) {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['id']);
    }

    // フォローされているか
    public function isFollowed(int $user_id) {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['id']);
    }
}
