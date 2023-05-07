<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // ユーザーID 1のユーザーがツイートIDごと = 各ユーザーの投稿に1つずつコメントを作成
        for ($i = 1; $i <= 10; $i++) {
            Comment::create([
                'user_id' => 1,
                'tweet_id' => $i,
                'text' => 'これはテストコメント' . $i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
