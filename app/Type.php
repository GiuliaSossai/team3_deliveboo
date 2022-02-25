<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // Relazione tabella Dishes
    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }
}
