<?php

namespace App\Http\Controllers;

use App\Http\Resources\SaleCollection;
use App\Models\Sale;
use App\Models\Workers;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function create(Request $request){
        Sale::create([
            'worker_id' => $request->worker_id,
            'client_id' => $request->client_id ?? null,
            'current_good_id' => $request->current_good_id,
        ]);
        return response()->json(['status' => 200]);
    }

    public function show(Workers $worker){
        $worker_id = $worker->id;
        $sales = Sale::query()->with('store_good_pivots','store_good_pivots.good')
                    ->where('worker_id', $worker_id)
                    ->get();
        return SaleCollection::collection($sales);
    }

    public function deleteAll(Request $request){
        Sale::query()->where('worker_id',$request->input('worker_id'))->delete();
    }

    public function deleteCurrent($worker_id,$good_id){
        Sale::query()->where('worker_id',$worker_id)
                    ->where('current_good_id',$good_id)
                    ->first()
                    ->delete();
    }
}
