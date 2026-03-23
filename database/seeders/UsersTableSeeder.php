<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Тестовый Пользователь',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'phone' => '+7 999 123-45-67',
            'address' => 'ул. Ленина, д. 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}