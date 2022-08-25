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

    public function category()
    {
        return $this->belongsTo(Category::class);
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

    public function scopeFeatured($query){
        return $query->whereFeatured(true);
    }

    public function scopeActive($query){
        return $query->whereStatus(true);
    }

    public function scopeHasQuantity($query){
        return $query->where('quantity'  , '>', 0);
    }

    public function scopeActiveCategory($query){
        return $query->whereHas('category'  , function($query){
            return $query->whereStatus(1);
        });
    }
}
