<?php

namespace App\Exports;


use App\Models\Master\Objek;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ObjekExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {   //kolom   
        return [
            'objekKd', 'objekNm', 'objekJenisKd'
        ];
    }
 public function collection()
    {
        // return new Objek([
        //     'compId' => $compId,
        //     'objekKd' => $row[0],
        //     'objekNm' => $row[1],
        //     'objekJenisKd' => $row[2]           
        // ]);
        return Objek::select('objekKd', 'objekNm', 'objekJenisKd')->get();
    }
}
