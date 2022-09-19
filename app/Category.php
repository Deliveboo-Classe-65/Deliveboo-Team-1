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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    // User model relationship
    public function users() {
        return $this->belongsToMany('App\User');
    }
}
