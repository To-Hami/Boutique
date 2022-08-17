<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class productTagSeeder extends Seeder

{

    public function run()
    {
        $tags = Tag::whereStatus(true)->pluck('id')->toArray();

        Product::all()->each(function($product)use($tags){
            $product->tags()->attach(Arr::random($tags,rand(2,3)));

        });


    }
}
