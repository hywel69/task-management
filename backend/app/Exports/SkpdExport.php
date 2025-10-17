<?php

namespace App\Exports;


use App\Models\Master\Skpd;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;


// class SkpdExport implements FromCollection, WithHeadings

class SkpdExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function headings(): array
    {
        // return $this->collection()->first()->keys()->toArray();
        return [
            'skpdKd', 'skpdNm', 'skpdJenis'
        ];
    }
    public function collection()
    {
        // return Skpd::select('uKd', 'uNm', 'uKdSkpd')->get();
        return Skpd::select('skpdKd', 'skpdNm', 'skpdJenis')->get();
    }

    // public function query()
    // {
    //     return Skpd::query()->where('id', $this->id);
    // }


}
