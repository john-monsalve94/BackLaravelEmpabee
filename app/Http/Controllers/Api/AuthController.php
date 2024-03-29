<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if (! $token = JWTAuth::attempt($request->only('email','password'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        JWTAuth::setToken($token);

        return $this->respondWithToken($token);
    }

    public function perfil(){
        $user = User::find(Auth::id());
        return response()->json($user);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->all());

        if (! $token = JWTAuth::attempt($request->only('email','password'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        JWTAuth::setToken($token);

        return $this->respondWithToken($token);
    }
}
