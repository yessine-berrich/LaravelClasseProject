<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Créer 50 posts pour l'utilisateur avec ID 1
        Post::factory()->count(50)->create([
            'user_id' => 1
        ]);
    }
}
