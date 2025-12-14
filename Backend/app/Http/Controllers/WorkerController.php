<?php

namespace App\Http\Controllers;

use App\Models\Workers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WorkerController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'code' => 'required',
        ]);

        $worker = Workers::where('login_code',$request->code)->first();
        if(!$worker){
            return response()->json([
                'status' => 'не правильные данные для входа',
            ]);
        }
        $token = $worker->createToken('auth-login')->plainTextToken;
        return response()->json([
            'status' => "успешный вход",
            'token' => $token,
        ]);
    }

    public function destroy(Request $request){
        $request->user()->currentAccessToken()->delete();
        
    }
}
