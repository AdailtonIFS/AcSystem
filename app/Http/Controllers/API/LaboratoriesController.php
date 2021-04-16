<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Laboratory;
use Illuminate\Http\Request;

class LaboratoriesController extends Controller
{
    public function updateByStatus(Request $request, Laboratory $labs)
    {
        try {
            $data = $request->validate([
                'status' => 'required|boolean',
            ],[
                'status.required' => 'Informe o status por favor.',
                'status.boolean' => 'O status só pode ter o valor 0 - Desligado 1 - Ligado.'
            ]);

            if(!$labs->update($data)){
                return response(['message' => 'Erro desconhecido ocorreu']);
            }
            return response(['message' => 'Status alterado com sucesso']);
        } catch (\Exception $e) {
            return response([
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ]);
        }
    }
}
