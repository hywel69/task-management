<?php

namespace App\Exports;


use App\Models\Laporan\Configsal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConfigsalExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {   //kolom   
        return [
            'reksalHeadId', 'reksalKode', 'reksalSkpdKd','reksalUnitKd',
        'reksalNilai','reksalCreateUser'
        ];
    }
 public function collection()
    {
        // return new Configsal([
        //     'compId' => $compId,
        //     'reksalHeadId' => $row[0],
        //     'reksalKode' => $row[1],
        //     'reksalSkpdKd' => $row[2],
        //     'reksalUnitKd' => $row[3],
        //     'reksalNilai' => $row[4],
        //     'reksalCreateUser' => $row[5],           
        // ]);
        return Configsal::select('reksalHeadId', 'reksalKode', 'reksalSkpdKd','reksalUnitKd',
        'reksalNilai','reksalCreateUser'
        )->get();
    }
}
