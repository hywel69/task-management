<?php

namespace App\Imports;

use App\Models\Laporan\Configlak;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class ConfiglakImport implements ToModel
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

        // SELECT lakId, lakHeadId, lakKode, lakKode2, lakSkpdKd, lakUnitKd, lakNilai, 
        // lakCreateTime, lakCreateUser, lakUpdateTime, lakUpdateUser, lakDeleteTime, 
        // lakDeleteUser, compId, created_at, updated_at FROM smartkada2023.reklaknilai;

        return new Configlak([
            'compId' => $compId,
            'lakHeadId' => '',
            'lakKode' => $row[4],
            'lakKode2' => '',
            'lakSkpdKd' => $row[0],
            'lakUnitKd' => $row[2],
            'lakNilai' => $row[6],
        ]);
    }
}
