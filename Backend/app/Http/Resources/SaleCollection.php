<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SaleCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return $this->resource->toArray();
        return [
            'id'=>$this->store_good_pivots->id,
            'quantity'=>$this->store_good_pivots->quantity,
            'title'=>$this->store_good_pivots->good->title,
            'price'=>$this->store_good_pivots->good->price,
            'discount'=>$this->store_good_pivots->good->discount,
        ];
    }
}
