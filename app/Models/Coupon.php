<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Coupon extends Model
{
    use HasFactory, SearchableTrait;

    protected $guarded = [];

    protected $dates = ['start_date', 'expire_date'];


    protected $searchable = [

        'columns' => [
            'product_coupons.code' => 10,
            'product_coupons.description' => 10,
        ],

    ];

    //function ==================================================

    public function status()
    {
        return $this->status ? 'Active' : 'In Active';
    }


}
