<?php

namespace App\Imports;

use App\Models\Master\Rincianobjek;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class RincianobjekImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return $row;
        // 'robjKd', 'robjNm', 'robjObjekKd'
        $compId = Session::get('compId');
        return new Rincianobjek([
            'compId' => $compId,
            'robjKd' => $row[0],
            'robjNm' => $row[1],
            'robjObjekKd' => $row[2]           
        ]);
    }
}
