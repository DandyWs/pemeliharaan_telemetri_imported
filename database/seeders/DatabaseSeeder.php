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

        $this->call(JenisPeralatanSeeder::class);
        $this->call(KomponenSeeder::class);
        $this->call(PemeliharaanSeeder::class);
        $this->call(PemeriksaanSeeder::class);
        $this->call(PeralatanTelemetriSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);
    }
}
