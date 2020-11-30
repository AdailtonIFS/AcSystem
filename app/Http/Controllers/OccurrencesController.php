<?php

namespace App\Http\Controllers;

use App\Http\Requests\Occurrences\StoreOccurrenceRequest;
use App\Occurrence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class OccurrencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $occurrences = Occurrence::join('users', 'occurrences.user_registration', '=', 'users.registration')
            ->select('occurrences.id', 'users.name', 'occurrences.date', 'occurrences.hour','occurrences.occurrence', 'occurrences.observation')
            ->get();


        foreach ($occurrences as $occurrence) {

            $occurrence->action = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $occurrence->id . '" data-original-title="Editar" class="edit btn btn-success btn-sm openEditLabModal">Editar</a>';
            $occurrence->action = $occurrence->action . ' | <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $occurrence->id . '" data-original-title="Deletar" class="btn text-white btn-danger  btn-sm deleteOccurrence">
            Excluir
        </a>';
        }

        return Datatables::of($occurrences)
            ->addIndexColumn()
            ->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOccurrenceRequest $storeOccurrenceRequest)
    {
        dd(\auth()->user());
        $occurrence = new Occurrence();
        $occurrence->user_registration = Auth::user()->registration;
        $occurrence->laboratory_id = $storeOccurrenceRequest->laboratory_id;
        $occurrence->date = isset($storeOccurrenceRequest->date) ? $storeOccurrenceRequest->date->format('Y-m-d') : now()->format('Y-m-d');
        $occurrence->hour = isset($storeOccurrenceRequest->hour) ? $storeOccurrenceRequest->date->format('H:i:s') : now()->format('H:i:s');
        $occurrence->occurrence = $storeOccurrenceRequest->occurrence;
        $occurrence->observation = $storeOccurrenceRequest->observation;
        $occurrence->save();
        return response()->json(['success' => 'Ocorrência Cadastrada com sucesso']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show($registration)
    {
        if (User::where('registration', $registration)->exists()) {
            $category = User::where('registration', $registration)->get();
            return response()->json($category, 200);
        } else {
            return response()->json([
                "message" => "Categoria não encontrada"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (User::where('registration', $request->registration)->exists()) {
            $user = User::find($request->registration);
            $user->registration = $request->registration;
            $user->name = $request->name;
            $user->category_id = $request->category;
            $user->status = $request->status;
            $user->save();
            return response()->json([
                "message" => "Usuário editado com sucesso"
            ], 200);
        } else {
            return response()->json([
                "message" => "Usuário não encontrado"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($registration)
    {
        if (User::where('registration', $registration)->exists()) {
            User::where('registration', $registration)->delete();
            return response()->json([
                "message" => "Usuário excluído com sucesso"
            ], 202);
        } else {
            return response()->json([
                "message" => "Usuário não encontrado"
            ], 404);
        }
    }
}
