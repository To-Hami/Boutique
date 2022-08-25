<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ProductCategorySeeder::class);
        $this->call(userTableSeeder::class);
        $this->call(productTableSeeder::class);
        $this->call(tagTableSeeder::class);
        $this->call(productTagSeeder::class);
        $this->call(productImagesSeeder::class);
        $this->call(couponsTableSeeder::class);
        $this->call(reviewsTableSeeder::class);
        $this->call(worldSeeder::class);
        $this->call(WorldStatusSeeder::class);
        $this->call(productReviewTableSeeder::class);
    }
}
