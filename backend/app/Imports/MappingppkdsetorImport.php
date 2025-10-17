<?php

namespace App\Imports;

use App\Models\Master\Mappingppkdsetor;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;

class MappingppkdsetorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappingppkdsetor([
            'compId' => $compId,
            'setKdDebet' => $row[0],
            'setNmDebet' => $row[1],
            'setKdKredit' => $row[2],
            'setNmKredit' => $row[3]
        ]);
    }
}
