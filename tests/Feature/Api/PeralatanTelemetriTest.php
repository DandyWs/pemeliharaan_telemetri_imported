<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PeralatanTelemetri;

use App\Models\JenisPeralatan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PeralatanTelemetriTest extends TestCase
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
    public function it_gets_peralatan_telemetris_list(): void
    {
        $peralatanTelemetris = PeralatanTelemetri::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.peralatan-telemetris.index'));

        $response->assertOk()->assertSee($peralatanTelemetris[0]->namaAlat);
    }

    /**
     * @test
     */
    public function it_stores_the_peralatan_telemetri(): void
    {
        $data = PeralatanTelemetri::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.peralatan-telemetris.store'),
            $data
        );

        $this->assertDatabaseHas('peralatan_telemetris', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_peralatan_telemetri(): void
    {
        $peralatanTelemetri = PeralatanTelemetri::factory()->create();

        $jenisPeralatan = JenisPeralatan::factory()->create();

        $data = [
            'namaAlat' => $this->faker->text(255),
            'serialNumber' => $this->faker->text(255),
            'lokasiStasiun' => $this->faker->text(255),
            'jenis_peralatan_id' => $jenisPeralatan->id,
        ];

        $response = $this->putJson(
            route('api.peralatan-telemetris.update', $peralatanTelemetri),
            $data
        );

        $data['id'] = $peralatanTelemetri->id;

        $this->assertDatabaseHas('peralatan_telemetris', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_peralatan_telemetri(): void
    {
        $peralatanTelemetri = PeralatanTelemetri::factory()->create();

        $response = $this->deleteJson(
            route('api.peralatan-telemetris.destroy', $peralatanTelemetri)
        );

        $this->assertModelMissing($peralatanTelemetri);

        $response->assertNoContent();
    }
}
