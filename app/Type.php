<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Dish;

class Type extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image'
    ];

    // Dish model relationship
    public function dishes() {
        return $this->belongsToMany('App\Dish');
    }
}
