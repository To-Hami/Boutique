<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class City extends Model
{
    use HasFactory;

    use HasFactory ,SearchableTrait;
    protected  $guarded = [];
    public $timestamps = false;

    //functions ========================================================

    protected $searchable = [

        'columns' => [
            'cities.name' => 10,
        ],
    ];

    public function status(){
        return $this->status ? 'Active' : 'In Active';
    }

    //  relations =======================================================

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function addresses(){
        return $this->hasMany(UserAddress::class);
    }

}

