<?php

namespace App\Imports;

use App\Models\Master\Mappingcp;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;

class MappingcpImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappingcp([
            'compId' => $compId,
            'cpKdTrans' => $row[0], 
            'cpNmTrans' => $row[1], 
            'cpKdDebet1' => $row[2], 
            'cpNmDebet1' => $row[3], 
            'cpKdKredit1' => $row[4], 
            'cpNmKredit1' => $row[5], 
            'cpKdDebet2' => $row[6], 
            'cpNmDebet2' => $row[7],
            'cpKdKredit2' => $row[8],
            'cpNmKredit2' =>$row[9]
        ]);
    }
}
