<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabsRequest;
use App\Labs;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class LabsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs = Labs::all();
        foreach ($labs as $lab) {
            if ($lab['status'] == 0) {
                    $lab['status'] = 'Desativado';
            }else{
                $lab['status'] = 'Ativado';
            }
        }
        return Datatables::of($labs)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                        $btn = 
                        '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Editar" class="edit btn btn-success btn-sm openEditLabModal">
                            Editar
                        </a>';

                        $btn = $btn.
                        ' | <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Deletar" class="btn text-white btn-danger  btn-sm deleteLab">
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
    public function store(LabsRequest $request)
    {
        $labs = new Labs();
        $labs->id = $request->id;
        $labs->description = $request->description;
        $labs->status = 0;
        $labs->save();
        if ($labs) {
            // return
        }

        return response()->json([
            'success'=>'Laboratório Cadastrado com Sucesso
        '],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Labs::where('id', $id)->exists()) {
            $labs = Labs::where('id',$id)->get();
            return response()->json($labs,200);
        }else{
            return response()->json([
                "message" => "Laboratório não encontrado"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (Labs::where('id', $request->id)->exists()) {
            $labs = Labs::find($request->id);
            $labs->description = $request->description;
            $labs->status = $request->status;
            $labs->save();
            return response()->json([
                "message" => "Laboratório editado com sucesso"
            ], 200);
            } else {
            return response()->json([
                "message" => "Laboratório não encontrado"
            ], 404);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Labs::where('id', $id)->exists()) {
            $labs = Labs::find($id);
            $labs->delete();
            return response()->json([
            "message" => "Laboratório excluído com sucesso"
            ], 202);
        } else {
            return response()->json([
            "message" => "Laboratório não encontrado"
            ], 404);
        }
    }
}
