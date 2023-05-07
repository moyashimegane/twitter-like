<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // 初期値として10人のユーザーを作成
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'screen_name' => 'test_user' . $i,
                'name' => 'TEST' . $i,
                'profile_image' => 'https://placehold.jp/50x50.png',
                'email' => 'test' . $i . '@test.com',
                'password' => Hash::make('ID' . $i),
                'remember_token' => str_random(10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
