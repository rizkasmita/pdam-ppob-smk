<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index', [
            'title' => 'Categories',
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create', [
            'title' => 'Add Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
            'tarif1' => 'required|numeric',
            'tarif2' => 'required|numeric',
            'tarif3' => 'required|numeric',
            'tarif4' => 'required|numeric'
        ]);

        Category::create($validatedData);
        
        // return redirect('/categories')->with('success', 'Category has been added successfully');
        return redirect('/penalties/create')->with('success', 'Category has been added successfully. Now you have to add the penalty fee.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', [
            'title' => 'Edit Category',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|unique:categories'
        // ]);

        $validatedData = [
            'name' => 'required',
            'tarif1' => 'required',
            'tarif2' => 'required',
            'tarif3' => 'required',
            'tarif4' => 'required',
        ];

        if($request->name != $category->name) {
            $validatedData['name'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($validatedData);

        Category::where('id', $category->id)->update($validatedData);

        return redirect('/categories')->with('success', 'Category has been edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect('/categories')->with('success', 'Category has been deleted successfully');
    }
}
