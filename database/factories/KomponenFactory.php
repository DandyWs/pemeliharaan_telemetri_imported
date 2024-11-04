<?php

namespace Database\Factories;

use App\Models\Komponen;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class KomponenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Komponen::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'namaKomponen' => $this->faker->text(255),
            'indikatorLED' => $this->faker->boolean(),
            'simCard' => $this->faker->boolean(),
            'kondisiAlat' => $this->faker->boolean(),
            'sambunganKabel' => $this->faker->boolean(),
            'perawatanSonde' => $this->faker->boolean(),
            'testDanSettingRTC' => $this->faker->boolean(),
            'levelAirAki' => $this->faker->boolean(),
            'teganganBateraiAki' => $this->faker->randomNumber(),
            'peralatan_telemetri_id' => \App\Models\PeralatanTelemetri::factory(),
        ];
    }
}
