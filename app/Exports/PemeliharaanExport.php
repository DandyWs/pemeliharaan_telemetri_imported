<?php

namespace App\Exports;

use App\Models\Pemeliharaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PemeliharaanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pemeliharaan::all(['tanggalPemeliharan', 'waktuMulaiPemeliharan', 'periodePemeliharaan', 'cuaca', 'no_AlatUkur', 'no_GSM', 'user_id', 'peralatan_telemetri_id']);
    }

    public function headings(): array
    {
        return [
            'Tanggal Pemeliharaan',
            'Waktu Mulai',
            'Periode',
            'Cuaca',
            'No Alat Ukur',
            'No GSM',
            'User ID',
            'Peralatan Telemetri ID'
        ];
    }
}
