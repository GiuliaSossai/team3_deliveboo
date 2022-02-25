<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Relazione tabella Restaurants
    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    // Relazione tabella Dishes
    public function dishes()
    {
        return $this->belongsToMany('App\Dish')->withPivot('quantity');
    }
}
