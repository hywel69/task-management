<?php

namespace App\Imports;

use App\Models\Laporan\Configaset;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class ConfigasetImport implements ToModel
{
   /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   public function model(array $row)
   {
      // SELECT asetId, asetHeadId, asetKode, asetSkpdKd, asetUnitKd, asetNilai,
      //  asetCreateTime, asetCreateUser, asetUpdateTime, asetUpdateUser, asetDeleteTime, asetDeleteUser, compId, created_at, updated_at
      // FROM smartkada2023.rekasetnilai;
      $compId = Session::get('compId');
      return new Configaset([
         'compId' => $compId,
         'asetHeadId' => $row[0],
         'asetKode' => $row[1],
         'asetSkpdKd' => $row[2],
         'asetUnitKd' => $row[3],
         'asetNilai' => $row[4],
         'asetCreateUser' => $row[5]
      ]);
   }
}
