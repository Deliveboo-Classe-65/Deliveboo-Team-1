<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'color', 'image'
    ];

    // User model relationship
    public function users() {
        return $this->belongsToMany('App\User');
    }
}
