<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'name' => 'required'
        ]);

        // persist
        $category = Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // respond
        return response()->json($category->toArray(), 201);
    }
}
