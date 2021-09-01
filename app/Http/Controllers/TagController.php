<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $tag = Tag::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $request->photo,
            'url' => $request->url,
            'isVendor' => $request->isVendor
        ]);

        return $tag->toArray();
    }

    public function index()
    {
        return Tag::all();
    }

    public function find($id)
    {
        return Tag::findOrFail($id);
    }

    public function delete($id)
    {
        Tag::findOrFail($id)->delete();

        @http_response_code(204);
    }
}
