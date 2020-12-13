<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabsRequest;
use App\Laboratory;
use Illuminate\Http\Request;

class LabsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratories = Laboratory::select('id', 'description', 'status')
            ->when(!empty(request()->get('name')), function ($query) {
                $data = request()->get('name');
                return $query->where('description', 'LIKE', "%$data%");
            })
            ->when(!is_null(request()->get('status')), function ($query) {
                return $query->where('status', '=', request()->get('status'));
            })
            ->orderBy('description', 'asc')
            ->get();

        return view('admin.laboratories.labs')->with('laboratories', $laboratories);
    }

    public function create()
    {
        return view('admin.laboratories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabsRequest $request)
    {
        $this->authorize('isAdmin');
        $request->validate([
            'id' => 'required|numeric|unique:laboratories,id',
            'description' => 'required|min:1'
        ],[
            'id.required' => 'O id é obrigatório',
            'id.numeric' => 'Os laboratórios são representados por numéros',
            'id.unique' => 'Esse laboratório já está cadastrado',
            'description.required' => 'A descrição é obrigatória'
        ]);

        $labs = new Laboratory();
        $labs->id = $request->id;
        $labs->description = $request->description;
        $labs->status = 0;
        $labs->save();

        return redirect()->route('labs.index')->with('message', 'Laboratório Cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Laboratory $labs
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratory $labs)
    {
        try {
            $occurrences = $labs->occurrences()->get();
            if ($occurrences) {
                foreach ($occurrences as $occurrence) {
                    $user = $occurrence->user()->first();
                }
            }

            return view('admin.laboratories.show')
                ->with('laboratory', $labs)
                ->with('occurrences', $occurrences ?? '')
                ->with('user', $user);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit(Laboratory $labs)
    {
        $this->authorize('isAdmin');
        try {
            return view('admin.laboratories.edit')
                ->with('laboratory', $labs);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Laboratory $labs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratory $labs)
    {
        $this->authorize('isAdmin');

        $request->validate([
            'description' => 'required|min:1',
        ],[
            'description.required' => 'A descrição é obrigatória'
        ]);
        $labs->description = $request->description;
        $labs->status = $request->status ?? 0;
        $labs->save();
        return redirect()->route('labs.index')->with('message', 'Laboratório Editado com Sucesso!');
    }

    public function delete(Laboratory $labs)
    {
        $this->authorize('isAdmin');
        return view('admin.laboratories.delete')->with('laboratory', $labs);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Laboratory $labs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratory $labs)
    {
        $this->authorize('isAdmin');

        if (count($labs->occurrences()->get()) > 0){
            return view('admin.laboratories.delete')->with('laboratory', $labs)->with('error', 'Não é possível excluir esse laboratório, pois existem ocorrências cadastrados nele!');
        }
        $labs::destroy($labs->id);
        return redirect()->route('labs.index')->with('message', 'Laboratório Excluído com Sucesso!');
    }
}
