<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuCategory;

class MenuCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name'        => 'Starters',
                'description' => 'Light dishes to begin your meal',
            ],
            [
                'name'        => 'Main Course',
                'description' => 'Hearty and satisfying main dishes',
            ],
            [
                'name'        => 'Desserts',
                'description' => 'Sweet treats to finish your meal',
            ],
            [
                'name'        => 'Drinks',
                'description' => 'Refreshing beverages and cocktails',
            ],
        ];

        foreach ($categories as $category) {
            MenuCategory::create($category);
        }
    }
}