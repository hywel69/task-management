<?php

namespace App\Imports;

use App\Models\Master\Subrincianobjek;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class SubrincianobjekImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return $row;
        // SELECT srobjId, srobjKd, srobjNm, srobjRobjKd, compId, created_at, updated_at FROM smartkada2023.mssubrincianobjek;

        $compId = Session::get('compId');
        return new Subrincianobjek([
            'compId' => $compId,
            'srobjKd' => $row[0],
            'srobjNm' => $row[1],
            'srobjRobjKd' => $row[2]           
        ]);
    }
}
