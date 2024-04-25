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
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/3/10',
            'reservation_time' => '21:00',
            'reservation_number' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '5',
            'reservation_date' => '2024/3/25',
            'reservation_time' => '19:30',
            'reservation_number' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '7',
            'reservation_date' => '2024/3/30',
            'reservation_time' => '18:00',
            'reservation_number' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/4/27',
            'reservation_time' => '19:45',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/5/28',
            'reservation_time' => '20:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/5/9',
            'reservation_time' => '16:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '12',
            'shop_id' => '1',
            'reservation_date' => '2024/5/19',
            'reservation_time' => '20:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '14',
            'shop_id' => '1',
            'reservation_date' => '2024/5/28',
            'reservation_time' => '20:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/6/28',
            'reservation_time' => '20:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/5/28',
            'reservation_time' => '20:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/5/28',
            'reservation_time' => '18:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/5/2',
            'reservation_time' => '19:30',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/5/28',
            'reservation_time' => '20:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '17',
            'shop_id' => '1',
            'reservation_date' => '2024/5/10',
            'reservation_time' => '17:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '18',
            'shop_id' => '1',
            'reservation_date' => '2024/5/8',
            'reservation_time' => '20:00',
            'reservation_number' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '9',
            'shop_id' => '1',
            'reservation_date' => '2024/5/2',
            'reservation_time' => '17:30',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '9',
            'shop_id' => '1',
            'reservation_date' => '2024/5/9',
            'reservation_time' => '20:00',
            'reservation_number' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '10',
            'shop_id' => '1',
            'reservation_date' => '2024/5/9',
            'reservation_time' => '20:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '12',
            'shop_id' => '1',
            'reservation_date' => '2024/5/10',
            'reservation_time' => '20:00',
            'reservation_number' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/5/15',
            'reservation_time' => '17:00',
            'reservation_number' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/5/16',
            'reservation_time' => '20:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '16',
            'shop_id' => '1',
            'reservation_date' => '2024/5/28',
            'reservation_time' => '20:00',
            'reservation_number' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/5/28',
            'reservation_time' => '20:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '18',
            'shop_id' => '1',
            'reservation_date' => '2024/6/1',
            'reservation_time' => '18:00',
            'reservation_number' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '18',
            'shop_id' => '1',
            'reservation_date' => '2024/6/1',
            'reservation_time' => '18:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/6/5',
            'reservation_time' => '21:30',
            'reservation_number' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/6/7',
            'reservation_time' => '20:00',
            'reservation_number' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '21',
            'shop_id' => '1',
            'reservation_date' => '2024/6/20',
            'reservation_time' => '18:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/6/20',
            'reservation_time' => '18:00',
            'reservation_number' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => '22',
            'shop_id' => '1',
            'reservation_date' => '2024/6/20',
            'reservation_time' => '19:00',
            'reservation_number' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('reservations')->insert($param);
    }
}
