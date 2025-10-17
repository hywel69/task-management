<?php

namespace App\Exports;


use App\Models\Akuntansi\Jurnal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JurnalExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {   //kolom   
        return [
            'klrNoJU', 'klrTglJU', 'klrSkpd','klrNmSkpd','klrUnit','klrNmUnit',
            'klrRef','klrSubRekDebet', 'klrNmSubRekDebet', 'klrSubRekKredit', 'klrNmSubRekKredit',
            'klrNilaiDebet', 'klrNilaiKredit', 'klrKeterangan','klrSumberDana','klrStatus', 'klrCreateUser'
        ];
    }
 public function collection()
    {
        // return new Jurnal([
        //     'compId' => $compId,
        //     'klrNoJU' => $row[0],
        //     'klrTglJU' => $row[1],
        //     'klrSkpd' => $row[2],
        //     'klrNmSkpd' => $row[3],
        //     'klrUnit' => $row[4],
        //     'klrNmUnit' => $row[5],
        //     'klrRef' => $row[6],
        //     'klrSubRekDebet' => $row[7],
        //     'klrNmSubRekDebet' => $row[8],
        //     'klrSubRekKredit' => $row[9],
        //     'klrNmSubRekKredit' => $row[10],
        //     'klrNilaiDebet' => $row[11],
        //     'klrNilaiKredit' => $row[12],
        //     'klrKeterangan' => $row[13],
        //     'klrSumberDana'  => $row[14],
        //     'klrStatus'  => $row[15],
        //     'klrCreateUser'  => $row[16]
   
        //  ]);

       
         return Jurnal::select('klrNoJU', 'klrTglJU', 'klrSkpd','klrNmSkpd','klrUnit','klrNmUnit',
         'klrRef','klrSubRekDebet', 'klrNmSubRekDebet', 'klrSubRekKredit', 'klrNmSubRekKredit',
         'klrNilaiDebet', 'klrNilaiKredit', 'klrKeterangan','klrSumberDana','klrStatus', 'klrCreateUser'
         )->limit(100)
         ->get();
    }
}
