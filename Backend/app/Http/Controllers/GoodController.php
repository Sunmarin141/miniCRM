<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    function getAllGoods(){
        $goods = Good::all();
        return $goods;
    }
}
