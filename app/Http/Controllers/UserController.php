<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirm'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json($user->toArray());
    }

    public function token(Request $request)
    {
        // issue a user token
        if($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            $user = User::where('email', $request->email)->first();
    
            if(!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status_code' => 401,
                    'error' => 'Invalid credentials'
                ], 401);
            }

            //$createToken = $user->createToken(base64_encode(md5($user->id . ':' . $user->email)));
            $createToken = $user->createToken($user->email, $user->scopes);

            if(!$createToken) return response()->json([
                'status_code' => 400,
                'error' => 'Failed to create token'
            ], 400);

            $accessToken = $createToken->plainTextToken;

            $token = $user->tokens()->where('id', $accessToken)->get();

            return response()->json([
                'status_code' => 200,
                'access_token' => $accessToken,
                'token_type' => 'Bearer',
                'data' => $token[0]
            ], 200);
        }

        // revoke a user token
        if($request->isMethod('delete')) {
            $token = $request->user()->tokens()->where('id', $request->bearerToken);

            if(!$token) return response()->json([
                'status_code' => 404,
                'error' => 'Invalid token'
            ], 404);

            $token->delete();

            @http_response_code(204);
        }
    }
}
