<?php

namespace App\Exports;


use App\Models\Laporan\Configlak;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConfiglakExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {   //kolom   
        // protected $fillable = ['compId','lakHeadId', 'lakKode', 'lakKode2', 
        // 'lakSkpdKd', 'lakUnitKd', 'lakNilai','lakCreateUser'];
        return [
            'lakHeadId', 'lakKode', 'lakKode2', 'lakSkpdKd', 'lakUnitKd', 'lakNilai', 
            'lakCreateUser'
        ];
    }
 public function collection()
    {
        return Configlak::select('lakHeadId', 'lakKode', 'lakKode2', 'lakSkpdKd', 'lakUnitKd', 'lakNilai', 
        'lakCreateUser')->get();
    }
}
