<?php

namespace App\Imports;

use App\Models\Anggaran\Anggaran;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class AnggaranImport implements ToModel
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

      // SELECT adrkaId, adrkaTahun, adrkaKdUbah, adrkaKdGab, adrkaSkpdKd, adrkaSkpdNm, 
      // adrkaUnitKd, adrkaUnitNm, adrkaKegKd, adrkaKegNm, adrkaSubKegKd, adrkaSubKegNm, 
      // adrkaRek5Kd, adrkaRek5Nm, adrkaSubRek5Kd, adrkaSubRek5Nm, adrkaNilai, adrkaNilaiUbah, 
      // adrkaRevisi1, adrkaRevisi2, adrkaRevisi3, adrkaRealNilai, adrkaSbrDana1, adrkaSbrDana2, 
      // adrkaSbrDana3, adrkaSbrDana4, adrkaSbrDana5, kdProg, kdGiat, kdSubGiat, kd_urusan, 
      // kd_bidang, kd_unit, kd_sub, adrkaCreateTime, adrkaCreateUser, adrkaUpdateTime, 
      // adrkaUpdateUser, adrkaDeleteTime, adrkaDeleteUser FROM smartkada2023.angdrka;

 
      return new Anggaran([
         'compId' => $compId,
         'adrkaTahun' => $row[0],
         'adrkaSkpdKd' => substr($row[1],0,17),
         // 'adrkaSkpdNm' => $row[2],
         'adrkaUnitKd' => substr($row[1],0,22),
         // 'adrkaUnitNm' => $row[4],
         'adrkaSubKegKd' => $row[1],
         'adrkaSubKegNm' => $row[2],
         'adrkaSubRekKd' => $row[3],
         'adrkaSubRekNm' => $row[4],
         'adrkaNilai' => $row[5],
         'adrkaNilaiUbah' => $row[6],


         'adrkaSbrDana1' => $row[7],
         // 'adrkaCreateUser' => $row[11],        

      ]);
   }
}
