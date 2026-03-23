<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Черный чай', 'description' => 'Классические черные чаи', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Зеленый чай', 'description' => 'Свежие зеленые чаи', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Фруктовый чай', 'description' => 'Ароматные фруктовые смеси', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Травяной чай', 'description' => 'Полезные травяные сборы', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}