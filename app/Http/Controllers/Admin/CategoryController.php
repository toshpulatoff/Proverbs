<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Controllers\Controller;
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

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);
    
        // Set parent_id to 0 for top-level categories
        $parent_id = $validatedData['parent_id'] ?? 0;
    
        // Create the category using validated data and adjusted parent_id
        Category::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'parent_id' => $parent_id,
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parentCategories = Category::where('id', '<>', $id)->get(); // Exclude the current category from parent options

        return view('admin.categories.edit', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        // Set parent_id to 0 for top-level categories
        $parent_id = $validatedData['parent_id'] ?? 0;

        // Update the category using validated data and adjusted parent_id
        $category->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'parent_id' => $parent_id,
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
