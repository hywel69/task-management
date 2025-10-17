<?php

namespace App\Imports;

use App\Models\Master\Mappingtunihil;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;
class MappingtunihilImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappingtunihil([
            'compId' => $compId,
            'hilKdTrans' => $row[0], 
            'hilNmTrans' => $row[1], 
            'hilKdDebet1' => $row[2], 
            'hilNmDebet1' => $row[3], 
            'hilKdKredit1' => $row[4], 
            'hilNmKredit1' => $row[5], 
            'hilKdDebet2' => $row[6], 
            'hilNmDebet2' => $row[7],
            'hilKdKredit2' => $row[8],
            'hilNmKredit2' =>$row[9]
        ]);
    }
}
