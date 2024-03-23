<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteShopsTableSeeder extends Seeder
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
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => '1',
        ];
        DB::table('favorite_shops')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => '1',
        ];
        DB::table('favorite_shops')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '6',
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => '1',
        ];
        DB::table('favorite_shops')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '7',
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => '1',
        ];
        DB::table('favorite_shops')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '10',
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => '1',
        ];
        DB::table('favorite_shops')->insert($param);
    }
}
