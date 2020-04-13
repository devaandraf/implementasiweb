<?php

namespace App\Exports;

use App\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BarangExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barang::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Ruangan',
            'Nama Barang',
            'Total',
            'Rusak',
            'Dibuat',
            'Dirubah',
            'Dibuat',
            'Dirubah'
        ];
    }
}
