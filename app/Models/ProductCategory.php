<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory ,Sluggable;

    protected $guarded =[];
    protected $appends =['parent'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    // scope ===================================================================

    public function scopeParent($query){
        return $query->whereNull('parent_id');
    }

    public function scopeChild($query){
        return $query->whereNotNull('parent_id');
    }



    // relation =================================================================

    public function __parent(){
        return $this->belongsTo(self::class,'parent_id');
    }



    public function children(){
        return $this->hasMany(self::class,'parent_id');
    }


    // function =================================================================
    // attribute =================================================================
}
