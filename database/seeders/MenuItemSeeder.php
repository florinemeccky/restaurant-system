<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuCategory;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        // Get each category by name so we can link items to them
        $starters   = MenuCategory::where('name', 'Starters')->first();
        $mainCourse = MenuCategory::where('name', 'Main Course')->first();
        $desserts   = MenuCategory::where('name', 'Desserts')->first();
        $drinks     = MenuCategory::where('name', 'Drinks')->first();

        $items = [
            // Starters
            [
                'category_id'  => $starters->id,
                'name'         => 'Spring Rolls',
                'description'  => 'Crispy vegetable spring rolls served with sweet chili sauce',
                'price'        => 5.99,
                'is_available' => true,
            ],
            [
                'category_id'  => $starters->id,
                'name'         => 'Tomato Soup',
                'description'  => 'Creamy homemade tomato soup with toasted bread',
                'price'        => 4.50,
                'is_available' => true,
            ],
            [
                'category_id'  => $starters->id,
                'name'         => 'Garlic Bread',
                'description'  => 'Toasted bread with garlic butter and herbs',
                'price'        => 3.99,
                'is_available' => true,
            ],

            // Main Course
            [
                'category_id'  => $mainCourse->id,
                'name'         => 'Grilled Chicken',
                'description'  => 'Herb-marinated grilled chicken with roasted vegetables',
                'price'        => 14.99,
                'is_available' => true,
            ],
            [
                'category_id'  => $mainCourse->id,
                'name'         => 'Beef Burger',
                'description'  => 'Juicy beef burger with lettuce, tomato, and fries',
                'price'        => 12.99,
                'is_available' => true,
            ],
            [
                'category_id'  => $mainCourse->id,
                'name'         => 'Grilled Salmon',
                'description'  => 'Fresh salmon fillet with lemon butter sauce and greens',
                'price'        => 17.99,
                'is_available' => true,
            ],
            [
                'category_id'  => $mainCourse->id,
                'name'         => 'Vegetable Pasta',
                'description'  => 'Penne pasta with seasonal vegetables in tomato sauce',
                'price'        => 10.99,
                'is_available' => true,
            ],

            // Desserts
            [
                'category_id'  => $desserts->id,
                'name'         => 'Chocolate Lava Cake',
                'description'  => 'Warm chocolate cake with a gooey molten center',
                'price'        => 6.99,
                'is_available' => true,
            ],
            [
                'category_id'  => $desserts->id,
                'name'         => 'Vanilla Ice Cream',
                'description'  => 'Three scoops of creamy vanilla ice cream',
                'price'        => 4.99,
                'is_available' => true,
            ],

            // Drinks
            [
                'category_id'  => $drinks->id,
                'name'         => 'Fresh Orange Juice',
                'description'  => 'Freshly squeezed orange juice',
                'price'        => 3.50,
                'is_available' => true,
            ],
            [
                'category_id'  => $drinks->id,
                'name'         => 'Sparkling Water',
                'description'  => 'Chilled sparkling mineral water',
                'price'        => 2.00,
                'is_available' => true,
            ],
            [
                'category_id'  => $drinks->id,
                'name'         => 'Mango Smoothie',
                'description'  => 'Blended fresh mango with yogurt and honey',
                'price'        => 4.99,
                'is_available' => true,
            ],
        ];

        foreach ($items as $item) {
            MenuItem::create($item);
        }
    }
}