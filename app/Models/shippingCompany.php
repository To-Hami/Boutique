<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class shippingCompany extends Model
{
    use HasFactory , SearchableTrait;

    protected $guarded = [];
    protected $searchable = [

        'columns' => [
            'shipping_companies.name' => 10,
            'shipping_companies.code' => 10,
            'shipping_companies.description' => 10,
        ],

    ];

    // relation =================================================================
    public function countries(){
        return $this->belongsToMany(Country::class, 'shipping_company_country');
    }
    // function =================================================================

    public function status(){
        return $this->status  ? 'Active' : 'In Active';
    }

    public function fast(){
        return $this->fast  ? 'Fast Delivery' : 'Normal Delivery';
    }
    // scope ====================================================================
    // attribute =================================================================
}
