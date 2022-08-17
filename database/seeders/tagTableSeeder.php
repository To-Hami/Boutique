<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class tagTableSeeder extends Seeder
{

    public function run()
    {
        Tag::create([ 'name' => 'clothes','status'=> true ] );
        Tag::create([ 'name' => 'shoes','status'=> true ] );
        Tag::create([ 'name' => 'watches','status'=> true ] );
        Tag::create([ 'name' => 'electronics','status'=> true ] );
        Tag::create([ 'name' => 'boys','status'=> true ] );
        Tag::create([ 'name' => 'girls','status'=> true ] );
        Tag::create([ 'name' => 'man','status'=> true ] );
        Tag::create([ 'name' => 'women','status'=> true ] );


    }
}
