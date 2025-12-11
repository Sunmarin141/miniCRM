<?php

namespace App\Http\Controllers;

use App\Http\Resources\GoodCollection;
use App\Models\Good;
use App\Models\StoreGoodPivot;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    function getAllGoods(){
        $goods = Good::all();
        return $goods;
    }

    function show($id){
        // $goods = StoreGoodPivot::where('good_id',$id)->get();
        // return response()->json($goods);
        return new GoodCollection(StoreGoodPivot::with('good','store')->where('good_id',$id)->get());
    }
}
