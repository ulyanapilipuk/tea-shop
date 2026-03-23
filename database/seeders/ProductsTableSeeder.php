<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $blackId = DB::table('categories')->where('name', 'Черный чай')->value('id');
        $greenId = DB::table('categories')->where('name', 'Зеленый чай')->value('id');

        DB::table('products')->insert([
            [
                'category_id' => $blackId,
                'name' => 'Ассам',
                'description' => 'Крепкий черный чай с насыщенным вкусом',
                'price' => 350.00,
                'image' => 'assam.jpg',
                'stock' => 20,
                'is_active' => true,
                'origin' => 'Индия',
                'weight' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $greenId,
                'name' => 'Сенча',
                'description' => 'Японский зеленый чай с травянистым вкусом',
                'price' => 450.00,
                'image' => 'sencha.jpg',
                'stock' => 15,
                'is_active' => true,
                'origin' => 'Япония',
                'weight' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}