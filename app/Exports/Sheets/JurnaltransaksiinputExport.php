<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Master\Importransaksi;
use DB;

class JurnaltransaksiinputExport implements FromCollection, WithTitle, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $kode;

    public function __construct($kode)
    {
        $this->kode = $kode;
    }

    public function collection()
    {
        return Importransaksi::where('impKodeTransaksi', '=', $this->kode)->get();
    }

    public function title() : string {
        return 'Transaksi';
    }

    public function headings(): array
	{
		return [
			[
				'ID',
				'KODE TRANSAKSI',
				'USER SYSTEM',
				'NOMOR TRANSAKSI',
				'TANGGAL TRANSAKSI',
				'KODE SKPD',
				'NAMA SKPD',
				'KODE UNIT', 
				'NAMA UNIT',
				'KODE SUB KEGIATAN',
				'NAMA SUB KEGIATAN',
				'REFERENSI',
				'KODE REKENING',
				'NAMA REKENING',
				'NILAI',
				'KETERANGAN',
				'KODE JENIS TRANSAKSI',
				'NAMA JENIS TRANSAKSI',
				'SUMBER DANA',
				'STATUS',
				'USER INPUT TRANSAKSI',
				'COMP ID',
				'CREATE_TIME',
				'UPDATE_TIME'
			],
		];
	}
}
