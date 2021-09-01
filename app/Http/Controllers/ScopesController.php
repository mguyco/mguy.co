<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scope;
use App\Models\UserScopes;

class ScopesController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        $scope = Scope::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json($scope->toArray(), 201);
    }

    public function delete($scopeId)
    {
        Scope::findOrFail($scopeId)->delete();

        UserScopes::where(['scope_id', $scopeId])->delete();

        @http_response_code(204);
    }
}
