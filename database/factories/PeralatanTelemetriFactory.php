<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PeralatanTelemetri;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeralatanTelemetriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PeralatanTelemetri::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'namaAlat' => $this->faker->text(255),
            'serialNumber' => $this->faker->text(255),
            'lokasiStasiun' => $this->faker->text(255),
            'jenis_peralatan_id' => \App\Models\JenisPeralatan::factory(),
        ];
    }
}
