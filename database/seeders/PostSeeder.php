<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Post::factory()
//            ->count(3)
//            ->for(Category::factory())
//            ->create();
        $user = Post::factory(3)
            ->has(Category::factory()->count(1))
            ->create();
    }
}
