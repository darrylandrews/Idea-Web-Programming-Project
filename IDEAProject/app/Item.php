<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function type()
    {   
        // has one type
        return $this->belongsTo(Type::class);
    }

    public function itemtransaction()
    {   
        // belongs to many transaction
        return $this->hasMany(ItemTransaction::class);
    }

    public function cart()
    {   
        // has many cart
        return $this->hasMany(Cart::class);
    }
}
