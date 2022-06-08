<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function item()
    {   
        // has many items
        return $this->hasMany(Item::class);
    }
}
