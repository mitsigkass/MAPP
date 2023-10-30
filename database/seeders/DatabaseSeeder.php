<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(10)->create();
        \App\Models\Section::factory(10)->create();
         User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '$2y$10$4l/4elhqoyCoUD6y0.n4.OQCXc9HrrvlzXJJ2/IfLCm9/m5JeUKxK',
         ]);
    }
}
