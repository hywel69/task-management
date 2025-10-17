<?php

namespace App\Imports;

use App\Models\Master\Subkegiatan;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class SubkegiatanImport implements ToModel
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
        return new Subkegiatan([
            'compId' => $compId,
            'skegKd' => $row[0],
            'skegNm' => $row[1],
            'skegKegKd' => $row[2]
           
        ]);
    }
}
