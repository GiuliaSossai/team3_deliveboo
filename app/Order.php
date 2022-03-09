<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'restaurant_id',
        'customer_name',
        'customer_surname',
        'delivery_address',
        'customer_email',
        'customer_phone',
        'final_price',
    ];

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
