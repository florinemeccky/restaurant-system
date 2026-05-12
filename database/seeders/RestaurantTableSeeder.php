<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RestaurantTable;

class RestaurantTableSeeder extends Seeder
{
    public function run(): void
    {
        // Define our tables with their capacity
        $tables = [
            ['table_number' => 'T1',  'capacity' => 2,  'status' => 'available'],
            ['table_number' => 'T2',  'capacity' => 2,  'status' => 'available'],
            ['table_number' => 'T3',  'capacity' => 4,  'status' => 'available'],
            ['table_number' => 'T4',  'capacity' => 4,  'status' => 'available'],
            ['table_number' => 'T5',  'capacity' => 4,  'status' => 'available'],
            ['table_number' => 'T6',  'capacity' => 6,  'status' => 'available'],
            ['table_number' => 'T7',  'capacity' => 6,  'status' => 'available'],
            ['table_number' => 'T8',  'capacity' => 8,  'status' => 'available'],
            ['table_number' => 'T9',  'capacity' => 8,  'status' => 'available'],
            ['table_number' => 'T10', 'capacity' => 10, 'status' => 'available'],
        ];

        // Loop through and create each table
        foreach ($tables as $table) {
            RestaurantTable::create($table);
        }
    }
}