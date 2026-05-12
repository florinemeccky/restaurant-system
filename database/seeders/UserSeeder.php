<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user — full access to everything
        User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@restaurant.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        // Staff user — manages orders and reservations
        User::create([
            'name'     => 'Staff User',
            'email'    => 'staff@restaurant.com',
            'password' => Hash::make('password'),
            'role'     => 'staff',
        ]);

        // Customer users — regular customers
        User::create([
            'name'     => 'Alice Customer',
            'email'    => 'alice@example.com',
            'password' => Hash::make('password'),
            'role'     => 'customer',
        ]);

        User::create([
            'name'     => 'Bob Customer',
            'email'    => 'bob@example.com',
            'password' => Hash::make('password'),
            'role'     => 'customer',
        ]);
    }
}