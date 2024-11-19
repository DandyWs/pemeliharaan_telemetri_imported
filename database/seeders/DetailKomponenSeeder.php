<?php

namespace Database\Seeders;

use App\Models\DetailKomponen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailKomponenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_komponens')->insert([
        [   
            'id' => 1,
            'komponen2_id' => 1,
            'namadetail' => 'Indikator LED',
        ],[
            'id' => 2,
            'komponen2_id' => 1,
            'namadetail' => 'Sim Card',
        ],[
            'id' => 3,
            'komponen2_id' => 2,
            'namadetail' => 'Test SMS Manual dan Setting RTC',
        ],[
            'id' => 4,
            'komponen2_id' => 2,
            'namadetail' => 'Indikator LED',
        ],[
            'id' => 5,
            'komponen2_id' => 2,
            'namadetail' => 'Pembersihan dan Pengecekan SONDE',
        ],[
            'id' => 6,
            'komponen2_id' => 3,
            'namadetail' => 'Pemeriksaan Kondisi Alat',
        ],[
            'id' => 7,
            'komponen2_id' => 3,
            'namadetail' => 'Pemeriksaan Sambungan Kabel',
        ],[
            'id' => 8,
            'komponen2_id' => 4,
            'namadetail' => 'Pemeriksaan Kondisi Alat',
        ],[
            'id' => 9,
            'komponen2_id' => 4,
            'namadetail' => 'Pemeriksaan Sambungan Kabel',
        ],[
            'id' => 10,
            'komponen2_id' => 5,
            'namadetail' => 'Pemeriksaan Kondisi Alat',
        ],[
            'id' => 11,
            'komponen2_id' => 5,
            'namadetail' => 'Pemeriksaan Sambungan Kabel',
        ],[
            'id' => 12,
            'komponen2_id' => 6,
            'namadetail' => 'Pemeriksaan Kondisi Alat',
        ],[
            'id' => 13,
            'komponen2_id' => 6,
            'namadetail' => 'Pemeriksaan Sambungan Kabel',
        ],[
            'id' => 14,
            'komponen2_id' => 7,
            'namadetail' => 'Pemeriksaan Level Air Aki',
        ],[
            'id' => 15,
            'komponen2_id' => 7,
            'namadetail' => 'Pemeriksaan Sambungan Kabel',
        ],[
            'id' => 16,
            'komponen2_id' => 7,
            'namadetail' => 'Tegangan',
        ],[
            'id' => 17,
            'komponen2_id' => 8,
            'namadetail' => 'Pemeriksaan Kondisi Alat',
        ],[
            'id' => 18,
            'komponen2_id' => 8,
            'namadetail' => 'Pemeriksaan Sambungan Kabel',
        ],[
            'id' => 19,
            'komponen2_id' => 9,
            'namadetail' => 'Before Setting Tipping Bucket',
        ],[
            'id' => 20,
            'komponen2_id' => 9,
            'namadetail' => 'After Setting Tipping Bucket',
        ],[
            'id' => 21,
            'komponen2_id' => 10,
            'namadetail' => 'Before Setting Water Level Sensor',
        ],[
            'id' => 22,
            'komponen2_id' => 10,
            'namadetail' => 'After Setting Water Level Sensor',
        ]
        ]);
    }
}
