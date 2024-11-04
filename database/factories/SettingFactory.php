<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'namaSetting' => $this->faker->text(255),
            'nilaiSebelumKalibrasi' => $this->faker->randomNumber(0),
            'displaySebelumKalibrasi' => $this->faker->randomNumber(0),
            'nilaiSetelahKalibrasi' => $this->faker->randomNumber(0),
            'displaySetelahKalibrasi' => $this->faker->randomNumber(0),
            'peralatan_telemetri_id' => \App\Models\PeralatanTelemetri::factory(),
        ];
    }
}
