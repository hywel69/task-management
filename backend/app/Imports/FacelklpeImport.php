<?php

namespace App\Imports;

use App\Models\Master\Reklpe;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class FacelklpeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        
        $compId = Session::get('compId');

        return new Reklpe([
            'compId' => $compId,
            'seqno' => $row[0],
            'len' => $row[1],
            'kode' => $row[2],
            'nama' => $row[3],
            'rek' => $row[4],
            'rek2' => $row[5],
            'tipe' => $row[6],
            'level' => $row[7],
        ]);
    }
}
