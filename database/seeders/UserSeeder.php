<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => bcrypt('123456aA@'),
                'role_id'  => 1,
                'fullname' => 'Admin',
                'lecturer_code' =>  null,
                'email' => 'nguyenphuongnam12a9@gmail.com',
                'phone_number' => '0983562383',
            ],
            [
                'username' => null,
                'password' => null,
                'role_id'  => 2,
                'fullname' => 'Lecturer 1',
                'lecturer_code' =>  'GV001',
                'email' => 'nguyenphuongnam12a9@gmail.com',
                'phone_number' => '0983562383',
            ],
        ]);
    }
}