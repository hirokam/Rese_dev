<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '鈴木一郎',
            'role' => 'admin',
            'email' => 'i.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木花子',
            'role' => 'store',
            'email' => 'h.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木次郎',
            'role' => 'store',
            'email' => 'j.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木三郎',
            'email' => 's.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木四郎',
            'email' => 'si.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
    }
}
