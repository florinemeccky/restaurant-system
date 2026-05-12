<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ORDER MATTERS — categories must exist before items
        $this->call([
            UserSeeder::class,
            RestaurantTableSeeder::class,
            MenuCategorySeeder::class,
            MenuItemSeeder::class,
        ]);
    }
}