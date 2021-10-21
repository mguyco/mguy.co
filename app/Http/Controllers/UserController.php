<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'secret' => 'required|string'
        ]);

        if($request->secret == Str::lower(date('F') . date('Y'))) {
            $user = User::create([
                'name' => $request->name,
                'email' => Str::lower($request->email),
                'password' => Hash::make($request->password),
            ]);

            return response()->json($user->toArray());
        }

        return response()->json([
            'status_code' => 401,
            'error' => 'Never give up'
        ], 401);
    }

    public function delete(Request $request)
    {
        
    }
}
