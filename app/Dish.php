<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Type;
use App\Order;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'description', 'visibility'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'visibility','created_at', 'updated_at',
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
