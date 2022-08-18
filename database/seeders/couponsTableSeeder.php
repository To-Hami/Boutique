<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class couponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'Toh123',
            'type' => 'fixed',
            'value' => 200,
            'description' => 'Discount 200 SAR on your sales from website',
            'use_times' => 5,
            'start_date' => Carbon::now(),
            'expire_date' => Carbon::now()->addWeek(),
            'greater_than' => 600,
            'status' => true

        ]);


        Coupon::create([
            'code' => 'Ali123',
            'type' => 'percentage',
            'value' => 50,
            'description' => 'Discount 50% SAR on your sales from website',
            'use_times' => 5,
            'start_date' => Carbon::now(),
            'expire_date' => Carbon::now()->addWeek(),
            'greater_than' => null,
            'status' => true
        ]);

    }
}
