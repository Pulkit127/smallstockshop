<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::insert([
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('1234'), 'phone' => '7073251917', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
