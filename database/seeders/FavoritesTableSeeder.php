<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favorite;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // ユーザーID 1が自分 = ID 1以外のツーとに対して1つのいいねをつける
        for ($i = 2; $i <= 10; $i++) {
            Favorite::create([
                'user_id' => 1,
                'tweet_id' => $i
            ]);
        }
    }
}
