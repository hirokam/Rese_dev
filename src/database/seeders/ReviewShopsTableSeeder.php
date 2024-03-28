<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'shop_id' => '1',
            'stars' => '4',
            'comment' => 'サービス、食事、全て美味しかったです。リピートします。',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('review_shops')->insert($param);
    }
}
