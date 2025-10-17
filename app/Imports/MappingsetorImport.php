<?php

namespace App\Imports;

use App\Models\Master\Mappingsetor;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;

class MappingsetorImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappingsetor([
            'compId' => $compId,
            'setKdDebet' => $row[0],
            'setNmDebet' => $row[1],
            'setKdKredit' => $row[2],
            'setNmKredit' => $row[3]
        ]);
    }
}
