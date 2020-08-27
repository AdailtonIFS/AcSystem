<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
        ->join('categories', 'users.category_id', '=', 'categories.id')
        ->select([
            'users.registration',
            'users.name',
            'users.status',
            'categories.description'
            ])
        ->get();


        foreach ($users as $user) {
            if ($user->status == 0) {
                    $user->status = 'Desativado';
            }else{
                $user->status = 'Ativado';
            }
            $user->action = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$user->registration.'" data-original-title="Editar" class="edit btn btn-sucess btn-sm openEditLabModal">Editar</a>';
            $user->action = $user->action.' | <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$user->registration.'" data-original-title="Deletar" class="btn text-white btn-danger  btn-sm deleteUser">
            Excluir
        </a>';
        }
        
        return Datatables::of($users)
        ->addIndexColumn()
        ->toJson(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();
        $users->registration = $request->registration;
        $users->name = $request->name;
        $users->category_id = $request->category;
        $users->password = Str::random(8);
        $users->status = $request->status;
        $users->save();
        return response()->json(['success' => 'Usuário Cadastrado com sucesso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($registration)
    {
        if (User::where('registration', $registration)->exists()) {
            $category = User::where('registration',$registration)->get();
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($registration)
    {
        if(User::where('registration', $registration)->exists()) {
            User::where('registration',$registration)->delete();
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
