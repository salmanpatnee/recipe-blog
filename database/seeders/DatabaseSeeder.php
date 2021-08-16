<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::factory(2)->create();

        $categories = ['Dishes', 'Snacks', 'Meal', 'Family', 'Kids'];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category,
                'slug' => Str::slug($category, '-')
            ]);
        }

        $difficulties = ['Easy', 'Moderate', 'Hard'];

        foreach ($difficulties as $difficulty) {
            \App\Models\Difficulty::create([
                'name' => $difficulty,
                'slug' => Str::slug($difficulty, '-')
            ]);
        }

        \App\Models\Recipe::factory(20)->create();
    }
}
