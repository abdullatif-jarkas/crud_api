<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return response()->json([
            'status' => 'success',
            'brands' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slogan' => 'required|string|max:255',
        ]);

        $brand = Brand::create([
            'name' => $request->name,
            'slogan' => $request->slogan,
        ]);

        return response()->json([
            'status' => 'success',
            'brand' => $brand,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return response()->json([
            'status' => 'success',
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'slogan' => 'nullable|string|max:255',
        ]);
        $newData = [];
        if(isset($request->name)){
            $newData['name'] = $request->name;
        };
        if(isset($request->slogan)){
            $newData['name'] = $request->name;
        };
        $brand->update($newData);
        return response()->json([
            'status' => 'success',
            'brand' => $brand,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand -> delete();
    }
}
