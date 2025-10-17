<?php

namespace App\Imports;

use App\Models\Master\Mappingppkdcp;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;

class MappingppkdcpImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappingppkdcp([
            'compId' => $compId,
            'cpKdDebet' => $row[0],
            'cpNmDebet' => $row[1],
            'cpKdKredit' => $row[2],
            'cpNmKredit' => $row[3]
        ]);
    }
}
