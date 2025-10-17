<?php

namespace App\Imports;

use App\Models\Master\Mapneraca;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class FacelkneracaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        
        $compId = Session::get('compId');

        return new Mapneraca([
            'compId' => $compId,
            'seqno' => $row[0],
            'rek' => $row[1],
            'len' => $row[2],
            'sd' => $row[3],
            'kode' => $row[4],
            'nama' => $row[5],
            'kond' => $row[6],
            'kond2' => $row[7],
            'tipe' => $row[8],
            'level' => $row[9],
        ]);
    }
}
