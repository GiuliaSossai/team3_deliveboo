<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Relazione tabella Restaurants
    public function restaurants()
    {
        return $this->belongsToMany('App\Restaurant');
    }
}
