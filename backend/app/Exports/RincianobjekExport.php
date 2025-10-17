<?php

namespace App\Exports;


use App\Models\Master\Rincianobjek;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RincianobjekExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {   //kolom   
        // SELECT robjId, robjKd, robjNm, robjObjekKd, compId, created_at, updated_at FROM smartkada2023.msrincianobjek;

        return [
            'robjKd', 'robjNm', 'robjObjekKd'
        ];
    }
 public function collection()
    {
        // return new Rincianobjek([
        //     'compId' => $compId,
        //     'robjekKd' => $row[0],
        //     'robjekNm' => $row[1],
        //     'robjekObjekKd' => $row[2]           
        // ]);
        return Rincianobjek::select('robjKd', 'robjNm', 'robjObjekKd')->get();
    }
}
