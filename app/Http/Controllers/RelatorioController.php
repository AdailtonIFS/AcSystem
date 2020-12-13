<?php

namespace App\Http\Controllers;

use App\Exports\OccurrencesExport;
use App\Relatorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class RelatorioController extends Controller
{
    public function index()
    {
        $this->authorize('isAdmin');
        $relatorios = Relatorio::with('user:registration,name')
            ->select('id', 'path', 'created_by', 'created_at', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.occurrences.relatorio')->with('relatorios', $relatorios);
    }
    public function store()
    {
        $this->authorize('isAdmin');

        if ( !is_null(request()->post('datestart')) && !is_null(request()->post('datefinal'))   ){
            $file = 'ocorrencias'.request()->post('datestart').'_'.request()->post('datefinal').'.xlsx';
            $path = str_replace('-', '_', $file);
            Excel::store(new OccurrencesExport,'public/'.$path);
            $data = [
                'path' => $path,
                'created_by' => auth()->user()->registration
            ];
            Relatorio::create(['path' => $path, 'created_by' => auth()->user()->registration]);
            return redirect()->route('relatorio.index')->with('message', 'Relatório gerado com sucesso, confira a data e faça o download abaixo');
        }
        return redirect()->route('relatorio.index')->with('error', 'Opss!! Não conseguimos gerar o seu relatório');
    }

    public function show(Relatorio $relatorio)
    {
        $this->authorize('isAdmin');
        return Storage::download("/public/$relatorio->path", $relatorio->path);
    }
}
