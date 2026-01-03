<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoreGoodPivot extends Model
{   
    public function good(): BelongsTo
    {
        return $this->belongsTo(Good::class);
    }
    
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
