<?php

namespace App\Exports;


use App\Models\Laporan\Configlo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConfigloExport implements FromCollection, WithHeadings
{
   /**
    * @return \Illuminate\Support\Collection
    */
   public function headings(): array
   {   //kolom   
      return [
         'loKode', 'loSkpdKd', 'loUnitKd',
         'loNilai', 'loCreateUser'
      ];
   }
   public function collection()
   {
      // return new Configlo([
      //     'compId' => $compId,
      //     'loHeadId' => $row[0],
      //     'loKode' => $row[1],
      //     'loSkpdKd' => $row[2],
      //     'loUnitKd' => $row[4],
      //     'loNilai' => $row[5],
      //     'loCreateUser' => $row[6]          
      // ]);
      return Configlo::select(
         // 'loHeadId',
         'loKode',
         'loSkpdKd',
         'loUnitKd',
         'loNilai',
         'loCreateUser'
      )->get();
   }
}
