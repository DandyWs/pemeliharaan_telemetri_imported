<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Pemeliharaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PemeliharaanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pemeliharaan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggalPemeliharan' => $this->faker->dateTime('now', 'UTC'),
            'waktuMulaiPemeliharan' => $this->faker->dateTime('now', 'UTC'),
            'periodePemeliharaan' => $this->faker->text(255),
            'cuaca' => $this->faker->text(255),
            'no_AlatUkur' => $this->faker->randomNumber(),
            'no_GSM' => $this->faker->randomNumber(),
            'user_id' => \App\Models\User::factory(),
            'peralatan_telemetri_id' => \App\Models\PeralatanTelemetri::factory(),
        ];
    }
}
