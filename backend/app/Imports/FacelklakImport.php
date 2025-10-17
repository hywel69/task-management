<?php

namespace App\Imports;

use App\Models\Master\Maplak;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class FacelklakImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        
        $compId = Session::get('compId');

        return new Maplak([
            'compId' => $compId,
            'seqno' => $row[0],
            'rek' => $row[1],
            'kode' => $row[2],
            'kodecalk' => $row[3],
            'nama' => $row[4],
            'sd' => $row[5],
            'len' => $row[6],
            'kond' => $row[7],
            'kond2' => $row[8],
            'tipe' => $row[9],
            'level' => $row[10],
        ]);
    }
}
