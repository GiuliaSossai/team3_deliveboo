<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    // Relazione tabella Restaurants
    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    // Relazione tabella Types
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    // Relazione tabella Orders
    public function orders()
    {
        return $this->belongsToMany('App\Order')->withPivot('quantity');
    }
}
