<?php

namespace App\Exports;


use App\Models\Master\Unit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;



class UnitExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // 'uKd' => $row[0],
    // 'uNm' => $row[1],
    // 'uKdSkpd' => $row[2]
    public function headings(): array
    {
       
        return [
            'uKd', 'uNm', 'uKdSkpd','uJenis'
        ];
    }

    public function collection()
    {
        return Unit::select('uKd', 'uNm', 'uKdSkpd','uJenis')->get();
    }
}
