<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin'
            ],

            [
                'name' => 'staff Warehouse',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('staff123'),
                'role' => 'warehouse'
            ],

            [
                'name' => 'direktur',
                'email' => 'direktur@gmail.com',
                'password' => bcrypt('direktur123'),
                'role' => 'direktur'
            ],

        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
