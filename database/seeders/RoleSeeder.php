<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'status' => 1
            ],
            [
                'name' => 'Staff',
                'status' => 1
            ]
        ];
        DB::table('roles')->insert($roles);
    }
}
