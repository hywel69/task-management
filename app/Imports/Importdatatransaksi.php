<?php

namespace App\Imports;

use App\Models\Master\Importransaksi;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

use Session;

class Importdatatransaksi implements ToModel
{
   /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   public function model(array $row)
   {
      $compId = Session::get('compId');
      $user = Session::get('email');
      if($row[1]!=0){
         $date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1]));
      }else{
         $date = str_replace("'","",$row[1]);
      }
      return new Importransaksi([
         'compId' => $compId,
         'impUserComp' => $user,
         'impNoJurnal' => $row[0],
         'impTglJurnal' => $date,
         'impSkpd' => $row[2],
         'impNmSkpd' => $row[3],
         'impUnit' => $row[2],
         'impNmUnit' => $row[3],
         'impKdSubKeg' => $row[4],
         'impNmSubKeg' => $row[5],
         'impNoRef' => $row[6],
         'impKdRek' => $row[7],
         'impNmRek' => $row[8],
         'impNilai' => $row[9],
         'impKet' => $row[10],
         'impJenisTrans' => $row[11],
         'impNmJenis' => $row[12],
         'impSumberDana' => $row[13],
         'impStatus' => $row[14],
         'impCreateUser' => $row[15],
      ]);
   }
}
