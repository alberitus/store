<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.index');
    }

    public function table()
    {
        try {
            $data = [
                'category' => category::all(),
            ];
            return view('category.table', $data);
        } 
        catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'error' => 'Kesalahan query database: ' . $e->getMessage()
            ], 500);
        } 
        catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest  $request)
    {
        try {
            category::create($request->validated());
        
            return redirect()->back()->with('success', 'Add Category is Success.');
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('error', 'Data barang tidak ditemukan.');
        } 
        catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } 
        catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
    }
}
