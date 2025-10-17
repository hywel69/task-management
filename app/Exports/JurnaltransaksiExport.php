<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

use stdClass;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Exports\Sheets\JurnaltransaksiinputExport;
use App\Exports\Sheets\JurnaltransaksihasilExport;
use App\Exports\Sheets\JurnaltransaksihasilppkdExport;

class JurnaltransaksiExport implements WithMultipleSheets
{
    use Exportable;

    protected $kode;
    
    public function __construct(int $kode)
    {
        $this->kode = $kode;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new JurnaltransaksiinputExport($this->kode);
        $sheets[] = new JurnaltransaksihasilExport($this->kode);
        $sheets[] = new JurnaltransaksihasilppkdExport($this->kode);

        return $sheets;
    }

}
