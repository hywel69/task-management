<?php

namespace App\Imports;

use App\Models\Master\Mappingppkdls;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Session;

class MappingppkdlsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $compId = Session::get('compId');
        return new Mappingppkdls([
            'compId' => $compId,
            'lsKdDebet' => $row[0],
            'lsNmDebet' => $row[1],
            'lsKdKredit' => $row[2],
            'lsNmKredit' => $row[3]
        ]);
    }
}
