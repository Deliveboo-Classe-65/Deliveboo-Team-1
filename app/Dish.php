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

    public function users() {
        return $this->belongsTo('App\User');
    }

    public function types() {
        return $this->belongsToMany('App\Type');
    }

    public function orders() {
        return $this->belongsToMany('App\Order');
    }
}
