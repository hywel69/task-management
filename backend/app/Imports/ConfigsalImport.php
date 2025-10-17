<?php

namespace App\Imports;

use App\Models\Laporan\Configsal;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class ConfigsalImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // SELECT reksalId, reksalHeadId, reksalKode, reksalSkpdKd, reksalUnitKd, reksalNilai, 
        // reksalCreateTime, reksalCreateUser, reksalUpdateTime, reksalUpdateUser, reksalDeleteTime, 
        // reksalDeleteUser, compId, created_at, updated_at
        // FROM smartkada2023.reksalnilai;
        
        
        $compId = Session::get('compId');
        return new Configsal([
            'compId' => $compId,
            'reksalKode' => $row[4],
            'reksalSkpdKd' => $row[0],
            'reksalUnitKd' => $row[2],
            'reksalNilai' => $row[6],
            'reksalCreateUser' => $row[7],
           
            // 'reksalHeadId' => $row[0],

        ]);
    }
}
