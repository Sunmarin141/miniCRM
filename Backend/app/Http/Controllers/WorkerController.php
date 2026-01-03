<?php

namespace App\Http\Controllers;

use App\Models\Workers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WorkerController extends Controller
{
    public function login(Request $request){
        //TODO: сделать валидацию отдельную. 
        $request->validate([
            'code' => 'required',
        ]);
        $worker = Workers::where('login_code',$request->code)->first();
        //TODO: заменить на FindOrFail. 
        if(!$worker){
            return response()->json([
                'status' => '404',
            ]);
        }

        $token = $worker->createToken('auth-login')->plainTextToken;
        return response()->json([
            'status' => "200",
            'token' => $token,
            'worker_id' => $worker->id,
        ]);
    }

    public function destroy(Request $request){
        //TODO: сделать возвраты при успешном уничтожении. 
        $request->user()->currentAccessToken()->delete();
    }
}
