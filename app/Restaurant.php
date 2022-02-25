<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    // Relazione tabella Users
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Relazione tabella Dishes
    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }

    // Relazione tabella Categories
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    // Relazione tabella Orders
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
