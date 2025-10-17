<?php

namespace App\Exports;


use App\Models\Master\Subkegiatan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubkegiatanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {   //kolom   
        return [
            'skegKd', 'skegNm', 'skegKegKd'
        ];
    }
 public function collection()
    {
        // return new Subkegiatan([
        //     'compId' => $compId,
        //     'skegKd' => $row[0],
        //     'skegNm' => $row[1],
        //     'skegKegKd' => $row[2]
           
        // ]);
        return Subkegiatan::select('skegKd', 'skegNm', 'skegKegKd')->get();
    }
}
