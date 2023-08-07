<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'producttitle' => 'required',
            'productcategoryid' => 'nullable',
            'barcode' => 'required',
            'productstatus' => 'required',
        ]);

        Product::create([
            'producttitle' => $request->producttitle,
            'productcategoryid' => $request->productcategoryid,
            'barcode' => $request->barcode,
            'productstatus' => $request->productstatus,
        ]);

        return response()->json(['message' => 'Product added successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'producttitle' => 'required',
            'productcategoryid' => 'nullable',
            'barcode' => 'required',
            'productstatus' => 'required',
        ]);

        $product = Product::find($id);
        $product->producttitle = $request->producttitle;
        $product->productcategoryid = $request->productcategoryid;
        $product->barcode = $request->barcode;
        $product->productstatus = $request->productstatus;
        $product->save();

        return response()->json(['message' => 'Product updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function destroySelected($ids)
    {
        $ids = explode(",",$ids);
        Product::whereIn("id",$ids)->delete();
        return response()->json(['message' => 'Selected products deleted successfully']);
    }
}
