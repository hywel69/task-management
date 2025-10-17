<?php

namespace App\Imports;

use App\Models\Master\Skpd;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class SkpdImport implements ToModel
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
        return new Skpd([
            'compId' => $compId,
            'skpdKd' => $row[0],
            'skpdNm' => $row[1],
            'skpdJenis'=> $row[2],
        ]);
    }
}
