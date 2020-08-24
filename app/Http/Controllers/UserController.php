<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
       
        return view('admin.users.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            $user->action = $user->action.' | <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$user->registration.'" data-original-title="Deletar" class="btn text-white btn-danger  btn-sm deleteLab">
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
        $users->password = 0;
        $users->status = $request->status;
        $users->save();
        return response()->json(['success' => 'Cadastrado com sucesso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    { 
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
