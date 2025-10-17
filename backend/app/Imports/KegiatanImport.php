<?php

namespace App\Imports;

use App\Models\Master\Kegiatan;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class KegiatanImport implements ToModel
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
        return new Kegiatan([
            'compId' => $compId,
            'kegKd' => $row[0],
            'kegNm' => $row[1],
            'kegProgKd' => $row[2]
           
        ]);
    }
}
