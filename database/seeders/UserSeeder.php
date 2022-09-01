<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'username' => 'admin001',
                'email' => 'laravelproject12345@gmail.com',
                'password' => bcrypt('admin!2022'),
                'is_admin' => true,
                // 'activity_status' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'admin2',
                'username' => 'admin002',
                'email' => 'asdasd@gmail.com',
                'password' => bcrypt('asdasdasd'),
                'is_admin' => true,
                // 'activity_status' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=> 'Ahong',
                'username' => 'Ahong123',
                'email' => 'ahongcool39@gmail.com',
                'password' => bcrypt('12345678'),
                'is_admin' => false,
                // 'activity_status' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=> 'Test',
                'username' => 'Test123',
                'email' => 'zxczxc@gmail.com',
                'password' => bcrypt('zxczxczxc'),
                'is_admin' => false,
                // 'activity_status' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
