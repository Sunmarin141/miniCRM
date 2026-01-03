<?php

namespace App\Http\Controllers;

use App\Http\Resources\GoodCollection;
use App\Models\Good;
use App\Models\StoreGoodPivot;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as SupportCollection;

class GoodController extends Controller
{
    function getAllGoods(): SupportCollection{
        //TODO: возвращать корректный json, а не коллекцию. 
        $goods = Good::all();
        return $goods;
    }

    function show($id){
        return new GoodCollection(StoreGoodPivot::with('good','store')
                    ->where('good_id',$id)
                    ->get());
    }
}
