<?php

namespace App\Http\Controllers;

use App\Models\StoreGoodPivot;
use Illuminate\Http\Request;

class StoreGoodPivotController extends Controller
{
    public function updateQuantity(Request $request){
        foreach($request->all() as $req){
            $this->currentUpdateQuantity($req);
        }
        return response()->json([
            "message" => "is ok",
        ]);
    }

    private function currentUpdateQuantity(array $item){
        $good = StoreGoodPivot::find($item['current_good_id']);
        $good->quantity = $good->quantity - 1;
        $good->save();
    }
}
