<?php

namespace App\Imports;

use App\Models\Master\Jenis;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class JenisImport implements ToModel
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
        return new Jenis([
            'compId' => $compId,
            'jenisKd' => $row[0],
            'jenisNm' => $row[1],
            'jenisKelompokKd' => $row[2]           
        ]);
    }
}
