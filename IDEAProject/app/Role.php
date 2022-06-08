<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {   
        // has many users
        return $this->hasMany(User::class);
    }
}
