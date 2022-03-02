<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'restaurant_id',
        'type_id',
        'name',
        'description',
        'price',
        'visible',
        'photo'
    ];

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
