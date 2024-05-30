<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Database\Factories\PostFactory; // Import the PostFactory

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 100 posts using the factory
        PostFactory::times(100)->create();
    }
}

