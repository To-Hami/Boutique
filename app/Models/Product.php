<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
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
            'products.name' => 10,
        ],

    ];


    // relation  ==================================================

    public function categories()
    {
        return $this->belongsTo(Category::class, 'product_category_id', 'id');
    }

    public function tags(): MorphToMany
    {
        return $this->MorphToMany(Tag::class, 'taggable');
    }

    public function media(): MorphMany
    {
        return $this->MorphMany(Media::class, 'mediable');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    //function =========================================================
    public function status()
    {
        return $this->status ? 'Active' : 'In Active';
    }

    public function featured()
    {
        return $this->featured ? 'Yes' : 'No';
    }

    //scope =========================================================
}
