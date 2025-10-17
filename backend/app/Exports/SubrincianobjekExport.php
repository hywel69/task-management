<?php

namespace App\Exports;


use App\Models\Master\Subrincianobjek;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubrincianobjekExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {   //kolom   
        return [
            'srobjKd', 'srobjNm', 'srobjRobjKd'
        ];
    }
 public function collection()
    {

        // return new Subrincianobjek([
        //     'compId' => $compId,
        //     'subrobjKd' => $row[0],
        //     'subrobjNm' => $row[1],
        //     'subrobjRobjKd' => $row[2]           
        // ]);
        return Subrincianobjek::select('srobjKd', 'srobjNm', 'srobjRobjKd')->get();
    }
}
