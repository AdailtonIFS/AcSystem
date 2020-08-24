<?php

namespace App\Http\Controllers;

use App\Category;

use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return Datatables::of($category)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                        $btn = 
                        '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Editar" class="edit btn btn-sucess btn-sm openEditCategoryModal">
                            Editar
                        </a>';

                        $btn = $btn.
                        ' | <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Deletar" class="btn text-white btn-danger  btn-sm deleteCategory">
                            Excluir
                        </a>';
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $categoria = new Category();
         $categoria->id = $request->id;
         $categoria->description = $request->description;
         $categoria->save();

         return response()->json(['success'=>'Categoria Cadastrada com Sucesso']);
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Category::find($id);
        return response()->json($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $categoria = new Category();
        $categoria->id = $request->id;
        $categoria->description = $request->description;
        $categoria->save();

        return response()->json(['success'=>'Categoria Editada com Sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        return response()->json(['success'=>'Categoria Excluída com Sucesso']);
    }
}
