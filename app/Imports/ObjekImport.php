<?php

namespace App\Imports;

use App\Models\Master\Objek;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class ObjekImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return $row;
        $compId = Session::get('compId');
        return new Objek([
            'compId' => $compId,
            'objekKd' => $row[0],
            'objekNm' => $row[1],
            'objekJenisKd' => $row[2]           
        ]);
    }
}
