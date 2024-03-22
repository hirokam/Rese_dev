<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
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
            'reservation_date' => '2024/3/10',
            'reservation_time' => '21:00',
            'reservation_number' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '1',
            'shop_id' => '5',
            'reservation_date' => '2024/3/25',
            'reservation_time' => '19:30',
            'reservation_number' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '1',
            'shop_id' => '7',
            'reservation_date' => '2024/3/30',
            'reservation_time' => '18:00',
            'reservation_number' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '15',
            'shop_id' => '1',
            'reservation_date' => '2024/3/27',
            'reservation_time' => '19:45',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '21',
            'shop_id' => '1',
            'reservation_date' => '2024/3/28',
            'reservation_time' => '20:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
    }
}
