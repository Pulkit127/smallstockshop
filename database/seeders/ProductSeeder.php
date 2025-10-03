<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        $groceries = [
            'Rice', 'Wheat Flour', 'Sugar', 'Salt', 'Milk', 'Butter', 'Cheese', 'Bread', 
            'Eggs', 'Cooking Oil', 'Pasta', 'Noodles', 'Tomato Ketchup', 'Potatoes', 'Onions',
            'Garlic', 'Tea', 'Coffee', 'Biscuits', 'Oats', 'Corn Flakes', 'Peas', 'Lentils',
            'Beans', 'Chickpeas', 'Honey', 'Peanut Butter', 'Jam', 'Pickles', 'Spices',
            'Mustard Oil', 'Sunflower Oil', 'Soap', 'Shampoo', 'Detergent', 'Tissue Paper',
            'Green Tea', 'Soy Sauce', 'Vinegar', 'Rice Flour', 'Rava', 'Dry Fruits', 
            'Almonds', 'Cashews', 'Raisins', 'Walnuts', 'Dates', 'Coconut Oil', 'Jaggery',
            'Cereal', 'Chocolate', 'Ice Cream', 'Soft Drink', 'Juice', 'Yogurt', 'Curd',
            'Paneer', 'Tofu', 'Butter Milk', 'Frozen Peas', 'Frozen Sweet Corn', 'Pickled Olives',
            'Chili Powder', 'Turmeric Powder', 'Coriander Powder', 'Cumin Seeds', 'Black Pepper',
            'Cardamom', 'Cloves', 'Cinnamon', 'Basmati Rice', 'Brown Rice', 'Poha', 'Sabudana',
            'Green Gram', 'Black Gram', 'Red Lentils', 'White Peas', 'Sprouts', 'Soya Chunks',
            'Sesame Seeds', 'Flax Seeds', 'Chia Seeds', 'Mustard Seeds', 'Fenugreek Seeds',
            'Whole Wheat Bread', 'Multigrain Bread', 'Brown Bread', 'Energy Drink', 'Protein Powder',
            'Coconut Water', 'Herbal Tea', 'Green Moong', 'Kabuli Chana', 'Kala Chana', 'Urad Dal',
            'Masoor Dal', 'Toor Dal', 'Moong Dal', 'Arhar Dal'
        ];

        $now = Carbon::now();

        foreach (range(1, 100) as $i) {
            DB::table('products')->insert([
                'category_id' => 2,
                'name' => $groceries[array_rand($groceries)] . " " . Str::random(3),
                'market_price' => $faker->numberBetween(50, 500),
                'sale_price' => $faker->numberBetween(30, 450),
                'description' => $faker->sentence(12),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
