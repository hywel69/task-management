<?php

namespace App\Imports;

use App\Models\Laporan\Configlra;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class ConfiglraImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
//         SELECT lpdId, lpdKd, lpdSkpd, lpdSkpdNm, lpdUnit, lpdUnitNm, lpdUraian, lpdNilai, 
//         lpdCreateTime, lpdCreateUser, lpdUpdateTime, lpdUpdateUser, lpdDeleteTime, 
//         lpdDeleteUser, compId, created_at, updated_at
// FROM smartkada2023.lra_realpemdalalu;

        $compId = Session::get('compId');
        return new Configlra([
            'compId' => $compId,
            'lpdSkpd' => $row[0],
            'lpdSkpdNm' => $row[1],
            'lpdUnit' => $row[2],
            'lpdUnitNm' => $row[3],
            'lpdKd' => $row[4],
            'lpdUraian' => $row[5],
            'lpdNilai' => $row[6],
            'lpdCreateUser'=> $row[7]        
        ]);
    }
}
