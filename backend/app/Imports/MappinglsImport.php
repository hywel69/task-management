<?php

namespace App\Imports;

use App\Models\Master\Mappingls;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;

class MappinglsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappingls([
            'compId' => $compId,
            'lsKdTrans' => $row[0], 
            'lsNmTrans' => $row[1], 
            'lsKdDebet1' => $row[2], 
            'lsNmDebet1' => $row[3], 
            'lsKdKredit1' => $row[4], 
            'lsNmKredit1' => $row[5], 
            'lsKdDebet2' => $row[6], 
            'lsNmDebet2' => $row[7],
            'lsKdKredit2' => $row[8],
            'lsNmKredit2' =>$row[9]
        ]);
    }
}
