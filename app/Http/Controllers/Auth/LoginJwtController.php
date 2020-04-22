<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginJwtController extends Controller{

    public function login(Request $request){
        $credentials= $request->all(['email','password']);

        if(!$token = auth('api')->attempt($credentials)){
            return response()->json(['message'=>'Unauthorized'], 401);
        }

        return response()->json([
            'token'=> $token
        ]);
    }

    public function logout(){
        auth('api')->logout();
        return response()->json(['message'=>'Logout successfully!'], 200);
    }
}
