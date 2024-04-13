<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('roles')->insert($param);
        $param = [
            'role' => 'store',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('roles')->insert($param);
        $param = [
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('roles')->insert($param);
    }
}
