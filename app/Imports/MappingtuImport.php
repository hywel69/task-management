<?php

namespace App\Imports;

use App\Models\Master\Mappingtu;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;

class MappingtuImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappingtu([
            'compId' => $compId,
            'tuKdDebet' => $row[0],
            'tuNmDebet' => $row[1],
            'tuKdKredit' => $row[2],
            'tuNmKredit' => $row[3]
        ]);
    }
}
