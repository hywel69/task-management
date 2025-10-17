<?php

namespace App\Imports;

use App\Models\Master\Mappingppkdgu;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;

class MappingppkdguImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappingppkdgu([
            'compId' => $compId,
            'guKdDebet' => $row[0],
            'guNmDebet' => $row[1],
            'guKdKredit' => $row[2],
            'guNmKredit' => $row[3]
        ]);
    }
}
