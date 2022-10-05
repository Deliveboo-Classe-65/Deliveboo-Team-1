<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Category;
use App\Dish;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'description', 'address', 'image', 'vat_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Category model relationship
    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    // Dish model relationship
    public function dishes() {
        return $this->hasMany('App\Dish');
    }

    // Order model relationship
    public function orders() {
        return $this->hasMany('App\Order');
    }
}
