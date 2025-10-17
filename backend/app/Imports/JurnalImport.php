<?php

namespace App\Imports;

use App\Models\Akuntansi\Jurnal;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

use Session;

class JurnalImport implements ToModel
{
   /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   public function model(array $row)
   {
      // return $row;
      $compId = Session::get('compId');
   //    protected $fillable = array('compId', 'klrNoJU', 'klrTglJU', 'klrSkpd', 'klrNmSkpd', 'klrUnit', 'klrNmUnit', 'klrRef', 
   //    'klrRekDebet', 'klrSubRekDebet', 'klrNmSubRekDebet', 'klrRekKredit', 'klrSubRekKredit', 'klrNmSubRekKredit', 
   //   'klrNilaiDebet', 'klrNilaiKredit', 'klrKeterangan', 'klrOtomatis', 'klrReklas', 'klrSumberDana', 'klrStatus');

   // klrNoJU	klrTglJU	klrSkpd	klrNmSkpd	klrUnit	klrNmUnit	
   // klrRef	klrSubRekDebet	klrNmSubRekDebet	klrSubRekKredit	
   // klrNmSubRekKredit	klrNilaiDebet	klrNilaiKredit	klrKeterangan	
   // klrSumberDana klrStatus
   // return $row;
      if($row[1]!=0){
         $date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1]));
      }else{
         $date = str_replace("'","",$row[1]);
      }

      return new Jurnal([
         'compId' => $compId,
         'klrNoJU' => $row[0],
         'klrTglJU' => $date,
         'klrSkpd' => $row[2],
         'klrNmSkpd' => $row[3],
         'klrUnit' => $row[4],
         'klrNmUnit' => $row[5],
         'klrSubKeg' => $row[6],
         'klrNmSubKeg' => $row[7],
         'klrRef' => $row[8],
         'klrSubRekDebet' => $row[9],
         'klrNmSubRekDebet' => $row[10],
         'klrSubRekKredit' => $row[11],
         'klrNmSubRekKredit' => $row[12],
         'klrNilaiDebet' => $row[13],
         'klrNilaiKredit' => $row[14],
         'klrOtomatis' => 1,
         'klrKeterangan' => $row[15],
         'klrSumberDana'  => $row[16],
         'klrStatus'  => $row[17],
         'klrCreateUser'  => $row[18]

      ]);
   }
}