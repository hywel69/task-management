<?php

namespace App\Imports;

use App\Models\Master\Mappingsts;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;

class MappingstsImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappingsts([
            'compId' => $compId,
            'stsKdTrans' => $row[0], 
            'stsNmTrans' => $row[1], 
            'stsKdDebet1' => $row[2], 
            'stsNmDebet1' => $row[3], 
            'stsKdKredit1' => $row[4], 
            'stsNmKredit1' => $row[5], 
            'stsKdDebet2' => $row[6], 
            'stsNmDebet2' => $row[7],
            'stsKdKredit2' => $row[8],
            'stsNmKredit2' =>$row[9], 
            'stsKdDebet3' => $row[10], 
            'stsNmDebet3' => $row[11],
            'stsKdKredit3' => $row[12],
            'stsNmKredit3' => $row[13]
        ]);
    }
}
