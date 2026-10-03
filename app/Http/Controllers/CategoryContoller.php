<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();

        return view("categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom' => 'required|string|max:225',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'nom' => $request->nom,
            'description' => $request->description
        ]);

        return redirect()->route('categories')->with('success', 'la categories a été ajouter aves succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
            'nom' => 'required|string|max:225',
            'description' => 'nullable|string',
        ]);

        $category->update([
            'nom' => $request->nom,
            'description' => $request->description
        ]);

        return redirect()->route('categories')->with('success', 'la categories a été modifier aves succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('categories')->with('success', 'la categories a été supprimer aves succès !');
    }
}
