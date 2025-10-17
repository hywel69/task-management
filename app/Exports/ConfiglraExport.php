<?php

namespace App\Exports;


use App\Models\Laporan\Configlra;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConfiglraExport implements FromCollection, WithHeadings
{
   /**
    * @return \Illuminate\Support\Collection
    */
   public function headings(): array
   {   //kolom   
      return [
         'lpdKd', 'lpdSkpd', 'lpdSkpdNm',
         'lpdUnit', 'lpdUnitNm', 'lpdUraian', 'lpdNilai', 'lpdCreateUser'
      ];
   }
   public function collection()
   {
      // return new Configlra([
      //     'compId' => $compId,
      //     'lpdKd' => $row[0],
      //     'lpdSkpd' => $row[1],
      //     'lpdSkpdNm' => $row[2],
      //     'lpdUnit' => $row[3],
      //     'lpdUnitNm' => $row[4],
      //     'lpdUraian' => $row[5],
      //     'lpdNilai' => $row[6]           
      // ]);
      return Configlra::select(
         'lpdKd',
         'lpdSkpd',
         'lpdSkpdNm',
         'lpdUnit',
         'lpdUnitNm',
         'lpdUraian',
         'lpdNilai',
         'lpdCreateUser'
      )->get();
   }
}
