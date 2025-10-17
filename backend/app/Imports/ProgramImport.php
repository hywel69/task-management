<?php

namespace App\Imports;

use App\Models\Master\Program;
use Maatwebsite\Excel\Concerns\ToModel;

use Session;

class ProgramImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // SELECT progId, progKd, pKd, progNm, progSkpdKd, progUnitKd, compId, created_at, updated_at FROM smartkada2023.msprogram;

        $compId = Session::get('compId');
        return new Program([
            'compId' => $compId,
            'progKd' => $row[0],
            'progUkd' => substr($row[0],23,1),
            'progBuKd' => substr($row[0],25,2),
            'pKd' => substr($row[0],28,2),
            'progNm' => $row[1],
            'progUnitKd' => $row[2]
           
        ]);
    }
}
