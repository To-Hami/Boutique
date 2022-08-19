<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class reviewsTableSeeder extends Seeder
{

    public function run()
    {

        $faker = Factory::create();

        Product::all()->each(function ($product) use ($faker) {
            for ($i = 1; $i < rand(1, 3); $i++) {
                $product->reviews()->create([
                    'user_id' => 1,
                    'name' => $faker->userName,
                    'email' => $faker->safeEmail,
                    'title' => $faker->sentence,
                    'message' => $faker->paragraph,
                    'status' => rand(1, 2),
                    'rating' => rand(1, 5),
                ]);


            }

        });


    }
}
