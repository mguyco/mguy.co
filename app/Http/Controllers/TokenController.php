<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TokenController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)) {

            $scopes = (!is_array($user->scopes) ? array() : $user->scopes);
           
            $createToken = $user->createToken($user->email, $scopes);

            if(!$createToken) return response()->json([
                'status_code' => 400,
                'error' => 'Failed to create token'
            ], 400);
        }

        else {
            return response()->json([
                'status_code' => 401,
                'error' => 'Invalid credentials'
            ], 401);
        }

        $accessToken = $createToken->plainTextToken;

        $token = $user->tokens()->where('id', $accessToken)->get();

        return response()->json([
            'status_code' => 200,
            'access_token' => $accessToken,
            'token_type' => 'Bearer',
            'data' => $token[0]
        ], 200);
    }

    public function delete(Request $request)
    {
        $token = $request->user()->tokens()->where('id', $request->bearerToken);

        if(!$token) return response()->json([
            'status_code' => 404,
            'error' => 'Invalid token'
        ], 404);

        $token->delete();

        @http_response_code(204);
    }
}
