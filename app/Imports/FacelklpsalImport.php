<?php

namespace App\Imports;

use App\Models\Master\Reksal;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class FacelklpsalImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        
        $compId = Session::get('compId');

        return new Reksal([
            'compId' => $compId,
            'seqno' => $row[0],
            'len' => $row[1],
            'sd' => $row[2],
            'kode' => $row[3],
            'nama' => $row[4],
            'kode2' => $row[5],
            'kond' => $row[6],
            'kond2' => $row[7],
            'tipe' => $row[8],
            'level' => $row[9],
        ]);
    }
}
