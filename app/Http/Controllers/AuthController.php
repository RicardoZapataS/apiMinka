<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(){
        $credenciales = request(['email','password']);
        if(!$token = auth()->attempt($credenciales)){
            return response()->json(['error'=>'Correo o contrasenha invalido'], 400);
        }
        return $this->respondWithToken($token, 200);
    }

    private function respondWithToken($token){
        return response()->json([
            'token' => $token,
            'access_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function logout(){
        auth()->logout();
        return response()->json([
            'msg' =>'Se cerro la sesion con exito'
        ]);
    }
    
    public function refresh(){
        $token =auth()->refresh();
        return $this->respondWithToken($token, 200);
    }
    
    public function me(){
        return response()->json(auth()->user());
    }

}
