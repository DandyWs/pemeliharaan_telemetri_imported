<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Komponen;

use App\Models\PeralatanTelemetri;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KomponenTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_komponens_list(): void
    {
        $komponens = Komponen::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.komponens.index'));

        $response->assertOk()->assertSee($komponens[0]->namaKomponen);
    }

    /**
     * @test
     */
    public function it_stores_the_komponen(): void
    {
        $data = Komponen::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.komponens.store'), $data);

        $this->assertDatabaseHas('komponens', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_komponen(): void
    {
        $komponen = Komponen::factory()->create();

        $peralatanTelemetri = PeralatanTelemetri::factory()->create();

        $data = [
            'namaKomponen' => $this->faker->text(255),
            'indikatorLED' => $this->faker->boolean(),
            'simCard' => $this->faker->boolean(),
            'kondisiAlat' => $this->faker->boolean(),
            'sambunganKabel' => $this->faker->boolean(),
            'perawatanSonde' => $this->faker->boolean(),
            'testDanSettingRTC' => $this->faker->boolean(),
            'levelAirAki' => $this->faker->boolean(),
            'teganganBateraiAki' => $this->faker->randomNumber(),
            'peralatan_telemetri_id' => $peralatanTelemetri->id,
        ];

        $response = $this->putJson(
            route('api.komponens.update', $komponen),
            $data
        );

        $data['id'] = $komponen->id;

        $this->assertDatabaseHas('komponens', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_komponen(): void
    {
        $komponen = Komponen::factory()->create();

        $response = $this->deleteJson(
            route('api.komponens.destroy', $komponen)
        );

        $this->assertModelMissing($komponen);

        $response->assertNoContent();
    }
}
