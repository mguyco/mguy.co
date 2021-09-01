<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserScopes;

class UserScopesController extends Controller
{
    public function index()
    {
        return UserScopes::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|int',
            'scope_id' => 'required|int'
        ]);

        $response = UserScopes::create([
            'user_id' => $request->userId,
            'scope_id' => $request->scopeId
        ]);

        return response()->json($response->toArray(), 201);
    }

    public function delete($id)
    {
        UserScopes::findOrFail($id)->delete();

        @http_response_code(204);
    }
}
