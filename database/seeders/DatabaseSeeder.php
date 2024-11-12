<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ]);
        $jenisAlats = \App\Models\JenisAlat::factory()
            ->count(1)
            ->create([
                'namajenis' => 'AWLR',
                'setting' => '1',
            ]);
        $alatTelemetris = \App\Models\AlatTelemetri::factory()
            ->count(1)
            ->create([
                'lokasiStasiun' => 'DAS Citarum',
                'jenis_alat_id' => '1',
            ]);
        $komponen2s = \App\Models\Komponen2::factory()
            ->count(1)
            ->create([
                'nama' => 'Komponen',
            ]);

            $detailKomponens = \App\Models\DetailKomponen::factory()
            ->count(1)
            ->create([
                'namadetail' => 'Detail',
                'komponen2_id' => '1',
            ]);

        $pemeliharaan2s = \App\Models\Pemeliharaan2::factory()
            ->count(1)
            ->create([
                'tanggal' => '2021-08-01',
                'waktu' => '08:00:00',
                'periode' => '1',
                'cuaca' => 'Cerah',
                'no_alatUkur' => '1',
                'no_GSM' => '1',
                'alat_telemetri_id' => '1',
                'user_id' => '1',
            ]);
        $formKomponens = \App\Models\FormKomponen::factory()
            ->count(1)
            ->create([
                'pemeliharaan2_id' => '1',
                'detail_komponen_id' => '1',
            ]);
        $setting2s = \App\Models\Setting2::factory()
            ->count(1)
            ->create([
                'simulasi' => '1',
                'display' => '1',
                'form_komponen_id' => '1',
            ]);


            $this->call(AlatTelemetriSeeder::class);
            $this->call(DetailKomponenSeeder::class);
            $this->call(FormKomponenSeeder::class);
            $this->call(JenisAlatSeeder::class);
            $this->call(JenisPeralatanSeeder::class);
            $this->call(KomponenSeeder::class);
            $this->call(Komponen2Seeder::class);
            $this->call(PemeliharaanSeeder::class);
            $this->call(Pemeliharaan2Seeder::class);
            $this->call(PemeriksaanSeeder::class);
            $this->call(PeralatanTelemetriSeeder::class);
            $this->call(SettingSeeder::class);
            $this->call(Setting2Seeder::class);
            $this->call(UserSeeder::class);
    }
}
