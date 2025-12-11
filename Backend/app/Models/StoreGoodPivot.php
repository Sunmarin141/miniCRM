<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreGoodPivot extends Model
{
    public function good(){
        return $this->belongsTo(Good::class);

    }

    public function store(){
        return $this->belongsTo(Store::class);
    }
}
