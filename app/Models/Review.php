<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Review extends Model
{
    use HasFactory, SearchableTrait;
    protected $guarded = [];


    protected $searchable = [

        'columns' => [
            'reviews.name' => 10,
            'reviews.email' => 10,
            'reviews.title' => 10,
            'reviews.message' => 10,
        ],

    ];

    //relation ==============================================================
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //function ==================================================================

    public function status()
    {
        return $this->status == 1 ? 'Active' : 'In Active';
    }


}
