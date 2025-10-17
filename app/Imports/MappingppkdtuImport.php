<?php

namespace App\Imports;

use App\Models\Master\Mappingppkdtu;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;

class MappingppkdtuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappingppkdtu([
            'compId' => $compId,
            'tuKdDebet' => $row[0],
            'tuNmDebet' => $row[1],
            'tuKdKredit' => $row[2],
            'tuNmKredit' => $row[3]
        ]);
    }
}
