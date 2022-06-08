<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user()
    {   
        // has one user
        return $this->belongsTo(User::class);
    }

    public function itemtransaction()
    {   
        // belongs to many transaction
        return $this->hasMany(ItemTransaction::class);
    }
}
