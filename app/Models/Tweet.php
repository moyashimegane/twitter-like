<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Tweet extends Model
{
    // 論理削除：削除してもDBには残るがシステム上は削除したとみなす
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
