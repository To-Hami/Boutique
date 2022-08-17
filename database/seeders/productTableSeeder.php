<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class productTableSeeder extends Seeder
{

    public function run()
    {

        $faker = Factory::create();

        $categories = Category::whereNotNull('parent_id')->pluck('id');

        for ($i = 1; $i < 10; $i++) {

            $product [] = [
                'name' => $faker->sentence(2, true),
                'slug' => $faker->unique()->slug(2, true),
                'description' => $faker->paragraph(),
                'price' => $faker->numberBetween(5, 100),
                'quantity' => $faker->numberBetween(10, 100),
                'category_id' => $categories->random(),
                'featured' => rand(0, 1),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $chunks = array_chunk($product, 2);
        foreach ($chunks as $chunk) {
            Product::insert($chunk);
        }

    }
}
