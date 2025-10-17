<?php

namespace App\Imports;

use App\Models\Laporan\Configlo;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class ConfigloImport implements ToModel
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

//         SELECT loId, loHeadId, loKode, loSkpdKd, loUnitKd, loNilai, 
//         loCreateTime, loCreateUser, loUpdateTime, loUpdateUser, loDeleteTime, 
//         loDeleteUser, compId, created_at, updated_at
// FROM smartkada2023.reklonilai;

        return new Configlo([
            'compId' => $compId, 
            'loHeadId' => '',          
            'loKode' => $row[4],
            'loSkpdKd' => $row[0],
            'loUnitKd' => $row[2],
            'loNilai' => $row[6],
            'loCreateUser' => $row[7] 
            // 'loHeadId' => $row[0],         
        ]);
    }
}
