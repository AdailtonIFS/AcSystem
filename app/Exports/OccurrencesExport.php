<?php

namespace App\Exports;

use App\Occurrence;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class OccurrencesExport implements FromCollection
{
    public function collection()
    {
        return Occurrence::with('user:registration,name', 'laboratory:id,description')
            ->select('id', 'occurrence', 'user_registration', 'laboratory_id', 'date', 'hour')
            ->when(!empty(request()->post('datestart') && !empty(request()->post('datefinal'))), function ($query) {
                return $query
                    ->whereBetween('date', [request()->post('datestart'), request()->post('datefinal')]);
            })
            ->get();
    }
}
