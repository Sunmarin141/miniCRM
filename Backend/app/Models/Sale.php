<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

    public function store_good_pivots(){
        return $this->hasOne(StoreGoodPivot::class, 'id', 'current_good_id');
    }
}
