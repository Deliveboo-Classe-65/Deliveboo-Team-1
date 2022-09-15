<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Dish;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_name', 'client_surname', 'delivery_address', 'client_email', 'chosen_delivery_time', 'client_phone', 'total', 'sent'
    ];

    // User model relationship
    public function users() {
        return $this->belongsTo('App\User');
    }

    // Dish model relationship
    public function dishes() {
        return $this->belongsToMany('App\Dish');
    }
}
