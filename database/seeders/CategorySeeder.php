<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Electronics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Groceries',   'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Clothing',    'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Stationery',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cosmetics',   'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
