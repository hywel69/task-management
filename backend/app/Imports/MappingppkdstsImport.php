<?php

namespace App\Imports;

use App\Models\Master\Mappingppkdsts;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;

class MappingppkdstsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappingppkdsts([
            'compId' => $compId,
            'stsKdDebet' => $row[0],
            'stsNmDebet' => $row[1],
            'stsKdKredit' => $row[2],
            'stsNmKredit' => $row[3]
        ]);
    }
}
