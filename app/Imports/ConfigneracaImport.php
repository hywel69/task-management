<?php

namespace App\Imports;


use App\Models\Laporan\Configneraca;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class ConfigneracaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // protected $fillable = ['compId','nerHeadId','nerKode','nerSkpdKd','nerUnitKd','nerNilai','nerCreateUser'];

        $compId = Session::get('compId');
        return new Configneraca([
            'compId' => $compId,
            'nerKode' => $row[4],
            'nerSkpdKd' => $row[0],
            'nerUnitKd' => $row[2],
            'nerNilai'  => $row[6],
            'nerCreateUser' => $row[7],           
            // 'nerHeadId' => $row[0],         
        ]);
    }
}
