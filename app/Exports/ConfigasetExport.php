<?php

namespace App\Exports;


use App\Models\Laporan\Configaset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConfigasetExport implements FromCollection, WithHeadings
{
	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function headings(): array
	{   //kolom   
		return [
			'asetHeadId', 'asetKode', 'asetSkpdKd',
			'asetUnitKd', 'asetNilai', 'asetCreateUser'
		];
	}
	public function collection()
	{
		// return new Configaset([
		//     'compId' => $compId,
		//     'asetHeadId' => $row[0],
		//     'asetKode' => $row[1],
		//     'asetSkpdKd' => $row[2],
		//     'asetUnitKd' => $row[3],
		//     'asetNilai' => $row[4],
		//     'asetCreateUser' => $row[5]
		//  ]);
		return Configaset::select(
			'asetHeadId',
			'asetKode',
			'asetSkpdKd',
			'asetUnitKd',
			'asetNilai',
			'asetCreateUser'
		)->get();
	}
}
