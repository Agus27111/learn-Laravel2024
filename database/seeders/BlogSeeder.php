<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\User;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Membuat 4 blog palsu
        foreach (range(1, 4) as $index) {
            Blog::create([
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
                'user_id' => User::all()->random()->id,
            ]);
        }
    }
}
