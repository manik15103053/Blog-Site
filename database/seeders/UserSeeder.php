<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'User',
            'username' => 'user',
            'email'    => 'user@gmail.com',
            'password' => Hash::make('123456')
        ]);
        Admin::create([
            'name'     => 'Admin',
            'username' => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
