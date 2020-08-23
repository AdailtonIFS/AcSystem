<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabsRequest;

use Yajra\Datatables\Datatables;

use App\Labs;

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
        return view('admin.laboratories.labs',['labs'=>$labs]);
    }

    /**
     * Show the json data.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
                        '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Editar" class="edit btn btn-sucess btn-sm openEditLabModal">
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
     * @param  App\Http\Requests\LabsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabsRequest $request)
    {

        $labs = new Labs();
        $labs->id = $request->id;
        $labs->description = $request->description;
        $labs->status = 0;
        $labs->save();

        return response()->json(['success'=>'Laboratório Cadastrado com Sucesso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Labs::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\LabsRequest $request
     * @param  \App\Labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function update(LabsRequest $request, Labs $labs)
    {
        $labs->id = $request->id;
        $labs->description = $request->description;
        $labs->status = $request->status;
        $labs->save();

        return response()->json(['success'=>'Laboratório Editado com Sucesso']);
    }

    public function delete(Labs $labs)
    {   
        return view('admin.laboratories.delete', ['labs'=> $labs]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $labs = Labs::find($id)->delete();
        return response()->json(['success'=>'Laboratório Excluído com Sucesso']);
    }
}
