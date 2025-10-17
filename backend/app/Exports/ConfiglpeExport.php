<?php

namespace App\Exports;


use App\Models\Laporan\Configlpe;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConfiglpeExport implements FromCollection, WithHeadings
{
   /**
    * @return \Illuminate\Support\Collection
    */
   public function headings(): array
   {   //kolom   
      return [
         'reklpeHeadId', 'reklpeKode', 'reklpeSkpdKd',
         'reklpeUnitKd','reklpeNilai','reklpeCreateUser'
      ];
   }
   public function collection()
   {
   //    return new Configlpe([
   //       'compId' => $compId,
   //       'reklpeHeadId' => $row[0],
   //       'reklpeKode' => $row[1],
   //       'reklpeSkpdKd' => $row[2],
   //       'reklpeUnitKd' => $row[3],
   //       'reklpeNilai' => $row[4],
   //       'reklpeCreateUser' => $row[5],        
   //   ]);
      return Configlpe::select('reklpeHeadId', 'reklpeKode', 'reklpeSkpdKd',
      'reklpeUnitKd','reklpeNilai','reklpeCreateUser')->get();
   }
}
