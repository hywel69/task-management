<?php

namespace App\Exports;


use App\Models\Laporan\Configneraca;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConfigneracaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {   //kolom   
        return [
            'nerHeadId','nerKode','nerSkpdKd','nerUnitKd','nerNilai','nerCreateUser'
        ];
    }
 public function collection()
    {
        return Configneraca::select( 'nerHeadId','nerKode','nerSkpdKd','nerUnitKd','nerNilai','nerCreateUser')->get();
    }
}
