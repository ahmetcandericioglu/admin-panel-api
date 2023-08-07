<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categorytitle' => 'required|unique:categories',
            'categorydescription' => 'required',
            'categorystatus' => 'required',
        ]);

        $category = new Category();
        $category->categorytitle = $request->categorytitle;
        $category->categorydescription = $request->categorydescription;
        $category->categorystatus = $request->categorystatus;
        $category->save();

        return response()->json(['message' => 'Category added']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categorytitle' => 'required|unique:categories,id,'. $id,
            'categorydescription' => 'required',
            'categorystatus' => 'required',
        ]);

        $category = Category::find($id);
        $category->categorytitle = $request->categorytitle;
        $category->categorydescription = $request->categorydescription;
        $category->categorystatus = $request->categorystatus;
        $category->save();

        return response()->json(['message' => 'Category updated']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return response()->json(['message' => 'Category deleted']);
    }
}
