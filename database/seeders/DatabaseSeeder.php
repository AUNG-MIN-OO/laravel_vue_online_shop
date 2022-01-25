<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('aungminoo'),
            'image' => 'image/user.png',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('aungminoo'),
            'image' => 'image/user.png',
        ]);

        Category::create([
            'name' => 'belt',
            'slug' => 'belt',
        ]);

        Category::create([
            'name' => 'shirt',
            'slug' => 'shirt',
        ]);

        Category::create([
            'name' => 'computer',
            'slug' => 'computer',
        ]);

        Category::create([
            'name' => 'phone',
            'slug' => 'phone',
        ]);

        Product::factory(100)->create();
    }
}
