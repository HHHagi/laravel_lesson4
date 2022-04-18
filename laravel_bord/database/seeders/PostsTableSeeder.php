<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'title' => 'test',
            'message' => 'テストテスト',
            'user_id' => '1'
        ];
        DB::table('posts')->insert($param);

        $param = [
            'title' => 'test',
            'message' => 'テストテスト',
            'user_id' => '1'
        ];
        DB::table('posts')->insert($param);
        
        $param = [
            'title' => 'test',
            'message' => 'テストテスト',
            'user_id' => '1'
        ];
        DB::table('posts')->insert($param);

        $param = [
            'title' => 'test',
            'message' => 'テストテスト',
            'user_id' => '1'
        ];
        DB::table('posts')->insert($param);
    }
}
