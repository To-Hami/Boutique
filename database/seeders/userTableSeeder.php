<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clothes = User::create([
            'first_name' => 'Tohami',
            'last_name' => 'Abdalrahman',
            'username' => 'Tohami Abdalrahman',
            'email' => 'tohami00076@gmail.com',
            'mobile' => '0560286264',
            'password' => bcrypt('password'),
            ] );


    }
}
