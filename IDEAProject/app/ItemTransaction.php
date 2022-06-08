<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTransaction extends Model
{
    protected $table = "item_transaction";
    
    public function transaction()
    {   
        // belongs to many transaction
        return $this->belongsTo(Transaction::class);
    }

    public function item()
    {   
        // belongs to many transaction
        return $this->belongsTo(Item::class);
    }
}
