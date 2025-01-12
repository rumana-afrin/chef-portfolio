<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RecipeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('recipe_categories')->insert([
            ['category_name' => 'Veg', 'category_image' => $faker->imageUrl(640, 480, 'food', true), 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Non-Veg', 'category_image' => $faker->imageUrl(640, 480, 'food', true), 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Baking', 'category_image' => $faker->imageUrl(640, 480, 'food', true), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
