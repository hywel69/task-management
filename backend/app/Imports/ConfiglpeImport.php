<?php

namespace App\Imports;

use App\Models\Laporan\Configlpe;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class ConfiglpeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // SELECT reklpeId, reklpeHeadId, reklpeKode, reklpeSkpdKd, 
        // reklpeUnitKd, reklpeNilai, reklpeCreateTime, reklpeCreateUser, 
        // reklpeUpdateTime, reklpeUpdateUser, reklpeDeleteTime, reklpeDeleteUser, 
        // compId, created_at, updated_at
        // FROM smartkada2023.reklpenilai;
        
        $compId = Session::get('compId');
        return new Configlpe([
            'compId' => $compId,
           
            'reklpeKode' => $row[4],
            'reklpeSkpdKd' => $row[0],
            'reklpeUnitKd' => $row[2],
            'reklpeNilai' => $row[6],
            'reklpeCreateUser' => $row[7],

            // 'reklpeHeadId' => $row[0],
           
        ]);
    }
}
