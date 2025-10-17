<?php

namespace App\Exports;



use App\Models\Anggaran\Anggaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnggaranExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {   //kolom   
        return [
            'adrkaTahun', 'adrkaSkpdKd','adrkaUnitKd', 'adrkaUnitNm',
            'adrkaSubKegKd', 'adrkaSubKegNm', 'adrkaSubRekKd','adrkaSubRekNm','adrkaNilai',
            'adrkaSbrDana1','adrkaCreateUser'
        ];
    }
 public function collection()
    {
        // return new Anggaran([
        //     'compId' => $compId,
        //     'adrkaTahun' => $row[0],
        //     'adrkaSkpdKd' => $row[1],
        //     'adrkaSkpdNm' => $row[2],
        //     'adrkaUnitKd' => $row[3],
        //     'adrkaUnitNm' => $row[4],
        //     'adrkaSubKegKd' => $row[5],
        //     'adrkaSubKegNm' => $row[6],
        //     'adrkaSubRekKd' => $row[7],
        //     'adrkaSubRekNm' => $row[8],
        //     'adrkaNilai' => $row[9],
        //     'adrkaSbrDana1' => $row[10],
        //     'adrkaCreateUser' => $row[11],        
   
        //  ]);
        return Anggaran::select('adrkaTahun', 'adrkaSkpdKd','adrkaUnitKd', 'adrkaUnitNm',
        'adrkaSubKegKd', 'adrkaSubKegNm', 'adrkaSubRekKd','adrkaSubRekNm','adrkaNilai',
        'adrkaSbrDana1','adrkaCreateUser'
        )->get();
    }
}
