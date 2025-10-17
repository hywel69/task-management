<?php

namespace App\Exports;


use App\Models\Master\Jenis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JenisExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {   //kolom   
        return [
            'jenisKd', 'jenisNm', 'jenisKelompokKd'
        ];
    }
 public function collection()
    {
        // return new Jenis([
        //     'compId' => $compId,
        //     'jenisKd' => $row[0],
        //     'jenisNm' => $row[1],
        //     'jenisKelompokKd' => $row[2]           
        // ]);
        return Jenis::select('jenisKd', 'jenisNm', 'jenisKelompokKd')->get();
    }
}
