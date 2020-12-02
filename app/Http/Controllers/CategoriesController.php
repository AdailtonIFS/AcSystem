<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Occurrence;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index')->with('categories', $categories);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Category  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->id = $request->id;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('categories.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Category $category)
    {
        $users = $category->users()->get();
        return view('admin.category.show')->with('category', $category)->with('users', $users);
    }
    public function edit(Category $category)
    {
        try {
            return view('admin.category.edit')
                ->with('category', $category);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Category  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->id = $request->id;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories.edit', ['category' => $category]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

    }

}
