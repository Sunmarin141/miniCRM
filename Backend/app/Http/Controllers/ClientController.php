<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientPostRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClientController extends Controller
{
    public function register(ClientPostRequest $request){
        Client::create([
            'phone' => $request->phone,
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'third_name' => $request->third_name,
            'email' => $request->email,
        ]);
        return response()->json(['message' => 'success']);
    }

    public function findByPhone($phone){
        //policy&gates
        try{
            $client = Client::where('phone',$phone)->firstOrFail();
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message'=> "клиент не найден",
                "error" => $e,
            ]);
        }
        return response()->json([
            'status' => 200,
            'client' => $client,
        ]);
    }
    
    public function updateBonus(Request $request, Client $client){
        $client->bonuses = $request->input('bonuses') + $client->bonuses;
        $client->save();
        return response()->json(['message' => 'is ok']);
    }
}
