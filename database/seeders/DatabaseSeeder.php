<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Riyan',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin1234'),
        ]);
        Project::create([
            'name' => 'Simple Laravel Project',
            'price' => '50',
            'paid_link' => 'https://example.com/project1/paid',
            'free_link' => 'https://example.com/project1/free',
            'category_project' => 'Laravel Framework',
            'demo_link' => 'https://example.com/project1/demo',
            'image_link' => 'https://img.youtube.com/vi/hkHHwA-vEyQ/maxresdefault.jpg',
        ]);

        Project::create([
            'name' => 'Simple Laravel Project',
            'price' => '100',
            'paid_link' => 'https://example.com/project2/paid',
            'free_link' => 'https://example.com/project2/free',
            'category_project' => 'Laravel Framework',
            'demo_link' => 'https://example.com/project2/demo',
            'image_link' => 'https://img.youtube.com/vi/hkHHwA-vEyQ/maxresdefault.jpg',
        ]);

        Project::create([
            'name' => 'Project 3',
            'price' => '150',
            'paid_link' => 'https://example.com/project3/paid',
            'free_link' => 'https://example.com/project3/free',
            'category_project' => 'Artificial Intelligence',
            'demo_link' => 'https://example.com/project3/demo',
            'image_link' => 'https://img.youtube.com/vi/hkHHwA-vEyQ/maxresdefault.jpg',
        ]);

        Project::create([
            'name' => 'Project 4',
            'price' => '200',
            'paid_link' => 'https://example.com/project4/paid',
            'free_link' => 'https://example.com/project4/free',
            'category_project' => 'Data Science',
            'demo_link' => 'https://example.com/project4/demo',
            'image_link' => 'https://img.youtube.com/vi/hkHHwA-vEyQ/maxresdefault.jpg',
        ]);
    }
}
