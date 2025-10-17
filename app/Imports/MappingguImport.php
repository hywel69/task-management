<?php

namespace App\Imports;

use App\Models\Master\Mappinggu;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;

class MappingguImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappinggu([
            'compId' => $compId,
            'guKdTrans' => $row[0], 
            'guNmTrans' => $row[1], 
            'guKdDebet1' => $row[2], 
            'guNmDebet1' => $row[3], 
            'guKdKredit1' => $row[4], 
            'guNmKredit1' => $row[5], 
            'guKdDebet2' => $row[6], 
            'guNmDebet2' => $row[7],
            'guKdKredit2' => $row[8],
            'guNmKredit2' =>$row[9], 
            'guKdDebet3' => $row[10], 
            'guNmDebet3' => $row[11],
            'guKdKredit3' => $row[12],
            'guNmKredit3' =>$row[13]
        ]);
    }
}
