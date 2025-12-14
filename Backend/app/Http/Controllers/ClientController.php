<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'f_name' => 'required',
            's_name' => 'required',
            't_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        Client::create([
            'phone' => $request->phone,
            'first_name' => $request->f_name,
            'second_name' => $request->s_name,
            'third_name' => $request->t_name,
            'email' => $request->email,
        ]);
    }

    public function findByPhone(Request $request){
        $phone = $request->input('phone');
        if(!$phone){
            return response()->json([
                'status' => 404,
            ]);
        }
        $client = Client::where('phone',$phone)->get();
        return response()->json($client);
    }
}
