<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientPostRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function register(ClientPostRequest $request){
        Client::create([
            'phone' => $request->phone,
            'first_name' => $request->f_name,
            'second_name' => $request->s_name,
            'third_name' => $request->t_name,
            'email' => $request->email,
        ]);
        return response()->json(['message' => 'success']);
    }

    public function findByPhone(Request $request){
        $phone = $request->input('phone');
        $client = Client::where('phone',$phone)->first();
        if(!$client){
            return response()->json([
                'status' => 404,
            ]);
        }
        return response()->json([
            'status' => 200,
            'client' => $client,
        ]);
    }
}
