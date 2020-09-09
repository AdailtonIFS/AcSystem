<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Yajra\Datatables\Datatables;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return Datatables::of($category)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                        $btn = 
                        '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Editar" class="edit btn btn-success btn-sm openEditCategoryModal">
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
     * @param  \App\Http\Category  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->id = $request->id;
        $category->description = $request->description;
        $category->save();
        return response()->json(['success'=>'Categoria Cadastrada com Sucesso']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Category::where('id', $id)->exists()) {
            $category = Category::where('id',$id)->get();
            return response()->json($category,200);
        }else{
            return response()->json([
                "message" => "Categoria não encontrada"
            ], 404);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Category  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request)
    {
        if (Category::where('id', $request->id)->exists()) {
            $category = Category::find($request->id);
            $category->id = $request->id;
            $category->description = $request->description;
            $category->save();
            return response()->json([
                "message" => "Categoria editada com sucesso"
            ], 200);
            } else {
            return response()->json([
                "message" => "Categoria não encontrada"
            ], 404);
            }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Category::where('id', $id)->exists()) {
            Category::destroy($id);
            return response()->json([
            "message" => "Categoria excluída com sucesso"
            ], 202);
        } else {
            return response()->json([
            "message" => "Categoria não encontrada"
            ], 404);
        }

    }
}
