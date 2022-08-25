<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class productReviewTableSeeder extends Seeder
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
                    'title' =>$faker->sentence,
                    'message' =>$faker->paragraph,
                    'status' => 1,
                    'rating' => 4,
                ]);
            }
        });

    }
}
