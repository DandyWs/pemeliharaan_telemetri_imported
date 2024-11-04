<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PeralatanTelemetri;

class PeralatanTelemetriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PeralatanTelemetri::factory()
            ->count(5)
            ->create();
    }
}
