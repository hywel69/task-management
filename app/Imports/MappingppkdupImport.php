<?php

namespace App\Imports;

use App\Models\Master\Mappingppkdup;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;

class MappingppkdupImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappingppkdup([
            'compId' => $compId,
            'upKdDebet' => $row[0],
            'upNmDebet' => $row[1],
            'upKdKredit' => $row[2],
            'upNmKredit' => $row[3]
        ]);
    }
}
