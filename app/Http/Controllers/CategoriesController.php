<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Occurrence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');

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
        $this->authorize('isAdmin');

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
        $this->authorize('isAdmin');

        $request->validate([
            'id' => 'required|numeric|unique:categories,id',
            'description' => 'required|min:1'
        ],[
            'id.required' => 'O id é obrigatório',
            'id.numeric' => 'As categorias são representadas por números',
            'id.unique' => 'Essa categoria já está cadastrada',
            'description.required' => 'A descrição é obrigatória'
        ]);

        $category = new Category();
        $category->id = $request->id;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories.index')->with('message', 'Categoria Cadastrada com Sucesso!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Category $category)
    {
        $this->authorize('isAdmin');

        $users = $category->users()->get();
        return view('admin.category.show')->with('category', $category)->with('users', $users);
    }
    public function edit(Category $category)
    {
        $this->authorize('isAdmin');

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
        $this->authorize('isAdmin');

        $request->validate([
            'description' => 'required|min:1'
        ],[
            'description.required' => 'A descrição é obrigatória'
        ]);
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories.index', ['category' => $category])->with('message', 'Categoria Alterada com Sucesso!');
    }

    public function delete(Category $category)
    {
        $this->authorize('isAdmin');

        return view('admin.category.delete')->with('category', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Support\Facades\Redirect
c     */
    public function destroy(Category $category)
    {
        $this->authorize('isAdmin');

        if (count($category->users()->get()) > 0){
            return view('admin.category.delete')->with('category', $category)->with('error', 'Não é possível excluir essa categoria, pois existem usuários cadastrados nela');
        }
        $category::destroy($category->id);
        return redirect()->route('categories.index')->with('message', 'Categoria Excluída com Sucesso!');
    }

}
