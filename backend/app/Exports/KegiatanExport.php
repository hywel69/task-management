<?php

namespace App\Exports;


use App\Models\Master\Kegiatan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KegiatanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {   //kolom   
        return [
            'kegKd', 'kegNm', 'kegProgKd'
        ];
    }
 public function collection()
    {
        // return new Kegiatan([
        //     'compId' => $compId,
        //     'kegKd' => $row[0],
        //     'kegNm' => $row[1],
        //     'kegProgKd' => $row[2]
           
        // ]);
        return Kegiatan::select('kegKd', 'kegNm', 'kegProgKd')->get();
    }
}
