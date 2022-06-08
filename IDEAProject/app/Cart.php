<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    public function user()
    {   
        // has many user
        return $this->hasMany(User::class);
    }

    public function item()
    {   
        // belongsto item
        return $this->belongsTo(Item::class);
    }
}
