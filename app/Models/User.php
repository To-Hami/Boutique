<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Mindscms\Entrust\Traits\EntrustUserWithPermissionsTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'first_name',
        'last_name',
        'user_image',
        'username',
        'statues',
        'mobile',
        'email',
        'password',
        'username',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = ['full_name'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    // function ========================================================
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }


    public function status()
    {
        return $this->status == 1 ? 'Active' : 'In Active';
    }

    // scope ===================================================================

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
           return $q->where('username' , 'like' , "%$search%")
            ->orWhere('first_name' , 'like' , "%$search%");
        });
    }

}
