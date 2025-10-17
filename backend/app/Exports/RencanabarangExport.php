<?php

namespace App\Exports;


use App\Models\Master\Rencanabarang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RencanabarangExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {   //kolom   
        return [
            'sKd','Nm','sk'
        ];
    }
 public function collection()
    {
        return Rencanabarang::select('uKd', 'uNm', 'uKdSkpd')->get();
    }
}
