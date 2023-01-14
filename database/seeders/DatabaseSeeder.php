<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use \App\Models\Role;
use \App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        Role::create([
            'name' => 'admin',
            'description' => 'Administrator'
        ]);
        
        Role::create([
            'name' => 'staff',
            'description' => 'Staff'
        ]);

        Category::create([
            'name' => 'Action',
            'slug' => 'action'
        ]);

        Category::create([
            'name' => 'FPS',
            'slug' => 'fps'
        ]);

    }
}
