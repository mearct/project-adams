<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'name'      => 'Admin',
                'username'  => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  => Hash::make('1111'),
                'phone'     => '09325306900',
                'role'      => '2',
                'status'    => '1',
            ],

            // Agent
            [
                'name'      => 'Agent',
                'username'  => 'agent',
                'email'     => 'agent@gmail.com',
                'password'  => Hash::make('1111'),
                'phone'     => '09321234567',
                'role'      => '1',
                'status'    => '1',
            ],

            // User
            [
                'name'      => 'User',
                'username'  => 'user',
                'email'     => 'user@gmail.com',
                'password'  => Hash::make('1111'),
                'phone'     => '09279809466',
                'role'      => '0',
                'status'    => '1',
            ],
        ]);
    }
}
