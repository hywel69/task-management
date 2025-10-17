<?php

namespace App\Imports;

use App\Models\Master\Rencanabarang;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class RencanabarangImport implements ToModel
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
        return new Rencanabarang([
            'compId' => $compId,
            'rencDPA' => $row[0],
            'rencSkpd' => $row[1],
            'rencSkpdNm' => $row[2],
            'rencTahun' => $row[3],
            'rencSubro' => $row[4],
            'rencSubroNm' => $row[5],
            'rencSatuan' => $row[6],
            'rencQty' => $row[7],
            'rencNilai' => $row[8],
            'rencTotal' => $row[9],
            'rencKet' => $row[10]
        ]);
    }
}
