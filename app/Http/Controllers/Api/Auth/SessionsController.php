<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        if (! $token = auth()->attempt($request->all())) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')]
            ]);

            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $this->storeAuthToken($token);

        return $this->respondWithToken($token);
    }

    public function user(Request $request)
    {
        return JWTAuth::setToken(
            $request->input('auth_token')
        )->toUser()->toArray();
    }

    protected function storeAuthToken($token)
    {
        $user = auth()->user();

        $user->auth_token = $token;

        return $user->update();
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'auth_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}