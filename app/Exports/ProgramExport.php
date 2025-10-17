<?php

namespace App\Exports;


use App\Models\Master\Program;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProgramExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {   //kolom   
        return [
            'progKd', 'progNm', 'progUnitKd'
        ];
    }
 public function collection()
    {
        // return new prog([
        //     'compId' => $compId,
        //     'progKd' => $row[0],
        //     'progNm' => $row[1],
        //     'progUnitKd' => $row[2]
           
        // ]);
        return Program::select('progKd', 'progNm', 'progUnitKd')->get();
    }
}
