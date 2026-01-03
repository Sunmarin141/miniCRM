<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $guarded = [];
    
    public function store_good_pivots()
    {
        return $this->hasMany(StoreGoodPivot::class, 'good_id');
    }
}
