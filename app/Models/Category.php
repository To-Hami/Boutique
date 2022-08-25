<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Category extends Model
{
    use HasFactory, Sluggable, SearchableTrait;

    protected $guarded = [];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    protected $searchable = [

        'columns' => [
            'categories.name' => 10,
        ],

    ];


    // relation =================================================================

    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }


    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }


    public function appearChildren()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->where('status', true);
    }


    // function =================================================================

    public function status()
    {
        return $this->status ? 'Active' : 'In Active';
    }
    // attribute =================================================================


    // scope =====================================================================


}
