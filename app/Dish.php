<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dish extends Model
{
    protected $fillable = [
        'restaurant_id',
        'type_id',
        'name',
        'slug',
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

    static function generateSlug($string)
    {

        $slug = Str::slug($string);
        $original_slug = $slug;
        $count = 1;

        while (static::whereSlug($slug)->exists()) {

            $slug = $original_slug . '-' . $count++;
        }

        return $slug;
    }
}
