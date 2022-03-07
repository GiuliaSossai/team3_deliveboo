<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'address',
        'email',
        'p_iva',
        'phone',
        'delivery_price',
        'order_min',
        'delivery_time',
        'photo',
        'photo_bg',
    ];

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
