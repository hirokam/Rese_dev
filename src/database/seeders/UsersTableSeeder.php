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
            'role_id' => '1',
            'email' => '1.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木花子',
            'role_id' => '2',
            'email' => 'h.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木次郎',
            'role_id' => '2',
            'email' => '2.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木三郎',
            'role_id' => '2',
            'email' => '3.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木四郎',
            'role_id' => '2',
            'email' => '4.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木五郎',
            'role_id' => '2',
            'email' => '5.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木六郎',
            'role_id' => '2',
            'email' => '6.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木七郎',
            'role_id' => '2',
            'email' => '7.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木八郎',
            'role_id' => '2',
            'email' => '8.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木九郎',
            'role_id' => '2',
            'email' => '9.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木十郎',
            'role_id' => '2',
            'email' => '10.suzuki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '田中一郎',
            'role_id' => '2',
            'email' => '1.tanaka@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '田中次郎',
            'role_id' => '2',
            'email' => '2.tanaka@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '田中三郎',
            'role_id' => '2',
            'email' => '3.tanaka@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '田中四郎',
            'role_id' => '2',
            'email' => '4.tanaka@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '田中五郎',
            'role_id' => '2',
            'email' => '5.tanaka@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '田中六郎',
            'role_id' => '2',
            'email' => '6.tanaka@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '田中七郎',
            'role_id' => '2',
            'email' => '7.tanaka@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '田中八郎',
            'role_id' => '2',
            'email' => '8.tanaka@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '田中九郎',
            'role_id' => '2',
            'email' => '9.tanaka@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '田中十郎',
            'role_id' => '2',
            'email' => '10.tanaka@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '田中花子',
            'email' => 'h.tanaka@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
    }
}
