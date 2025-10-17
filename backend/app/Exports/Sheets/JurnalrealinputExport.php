<?php

namespace App\Exports\Sheets;

use App\Models\Akuntansi\Jurnal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Master\Importjurnal;
use DB;

class JurnalrealinputExport implements FromCollection, WithTitle, WithHeadings
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
        return Jurnal::where('klrJurId', '=', $this->kode)->where('klrHeadId',(NULL))->get();
    }

    public function title() : string {
        return 'Transaksi';
    }

    public function headings(): array
	{
		return [
			[
				'ID',
				'HEAD ID',
				'JURNAL ID',
				'NAMA FILE',
				'NOMOR JURNAL',
				'TANGGAL JURNAL',
				'KODE SKPD',
				'NAMA SKPD',
				'KODE UNIT', 
				'NAMA UNIT',
				'KODE SUB KEGIATAN',
				'NAMA SUB KEGIATAN',
				'REFERENSI',
				'',
				'REKENING DEBET',
				'NAMA REKENING DEBET',
				'',
				'REKENING KREDIT',
				'NAMA REKENING KREDIT',
				'NILAI DEBET',
				'NILAI KREDIT',
				'KETERANGAN',
				'OTOMATIS',
				'REKLAS',
				'REKLAS SUPPLIER PIUTANG',
				'SUMBER DANA',
				'STATUS',
				'SUMBER MAPPING',
				'CREATE_TIME',
				'CREATE_USER',
				'UPDATE_TIME',
				'UPDATE_USER',
				'DELETE_TIME',
				'DELETE_USER',
				'COMP ID',
				'CREATED_AT',
				'UPDATED_AT'
			],
		];
	}
}
