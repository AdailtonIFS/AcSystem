<?php

namespace App\Repositories;

use App\User;
use App\Contracts\UsersInterface;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class UserRepository extends AbstractRepository implements UsersInterface
{
    protected $model = User::class;

    public function getUsersWithCategoriesName()
    {
        $users = User::join('categories', 'users.category_id', '=', 'categories.id')
        ->select('users.id','users.name','users.status','users.email','categories.description')
        ->get();

        foreach ($users as $user) {
            if ($user->status == 0) {
                    $user->status = 'Desativado';
            }else{
                $user->status = 'Ativado';
            }
            $user->action = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$user->id.'" data-original-title="Editar" class="edit btn btn-success btn-sm openEditLabModal">Editar</a>';
            $user->action = $user->action.' | <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$user->id.'" data-original-title="Deletar" class="btn text-white btn-danger  btn-sm deleteUser">
            Excluir
        </a>';
        }

        return Datatables::of($users)
        ->addIndexColumn()
        ->toJson();
    }
}
