<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Akuntansi\Jurnal;
use DB;

class JurnaltransaksihasilppkdExport implements FromCollection, WithTitle, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $kode;

    public function __construct($kode)
    {
        $this->kode = $kode;
    }

    public function Collection()
    {
        return Jurnal::where(DB::raw('LEFT(klrHeadId,13)'), '=', $this->kode)
            ->where('klrSumberMapping','like','%PPKD%')
            ->get();
    }

    public function title() : string {
        return 'Hasil Jurnal PPKD';
    }

    public function headings(): array
	{
		return [
			[
				'ID',
				'ID PENGHUBUNG',
				'NOMOR JURNAL',
				'TANGGAL JURNAL',
				'KODE SKPD',
				'NAMA SKPD',
				'KODE UNIT',
				'NAMA UNIT',
				'KODE SUB KEGIATAN',
				'NAMA SUB KEGIATAN',
				'REFERENSI',
				'KODE DEBET',
				'KODE SUB DEBET',
				'NAMA SUB DEBET',
				'KODE KREDIT',
				'KODE SUB KREDIT',
				'NAMA SUB KREDIT',
				'NILAI DEBET',
				'NILAI KREDIT',
				'KETERANGAN',
				'KODE OTOMATIS',
				'REKLAS',
				'KODE SUPPLIER PIUTANG',
				'SUMBER DANA',
				'STATUS',
				'SUMBER MAPPING',
				'CREATE_TIME1',
				'CREATE_USER1',
				'UPDATE_TIME1',
				'UPDATE_USER1',
				'DELETE_TIME1',
				'DELETE_USER1',
                'COMP_ID',
				'CREATE_TIME_SYTEM',
				'UPDATE_TIME_SYTEM'
			],
		];
	}
}
