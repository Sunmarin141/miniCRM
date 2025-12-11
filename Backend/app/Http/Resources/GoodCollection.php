<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GoodCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function($good){
            return [
                'id' => $good->id,
                'good' => $good->good->title,
                'store' => $good->store->title,
                'quantity' => $good->quantity,
                'price' => $good->good->price,
            ];
        })->all();
    }
}
