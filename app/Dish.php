<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Type;
use App\Order;
class Dish extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'description', 'image', 'visibility'
    ];

    // User model relationship
    public function users() {
        return $this->belongsTo('App\User');
    }

    // Type model relationship
    public function types() {
        return $this->belongsToMany('App\Type');
    }

    // Order model relationship
    public function orders() {
        return $this->belongsToMany('App\Order')->withPivot('quantity');
    }
}
