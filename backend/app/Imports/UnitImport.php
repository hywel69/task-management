<?php

namespace App\Imports;

use App\Models\Master\Unit;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class UnitImport implements ToModel
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
        return new Unit([
            'compId' => $compId,
            'uKd' => $row[0],
            'uNm' => $row[1],
            'uKdSkpd' => $row[2],
            'uJenis' => $row[3]           
        ]);
    }
}
