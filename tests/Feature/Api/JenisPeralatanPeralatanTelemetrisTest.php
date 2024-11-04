<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\JenisPeralatan;
use App\Models\PeralatanTelemetri;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JenisPeralatanPeralatanTelemetrisTest extends TestCase
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
    public function it_gets_jenis_peralatan_peralatan_telemetris(): void
    {
        $jenisPeralatan = JenisPeralatan::factory()->create();
        $peralatanTelemetris = PeralatanTelemetri::factory()
            ->count(2)
            ->create([
                'jenis_peralatan_id' => $jenisPeralatan->id,
            ]);

        $response = $this->getJson(
            route(
                'api.jenis-peralatans.peralatan-telemetris.index',
                $jenisPeralatan
            )
        );

        $response->assertOk()->assertSee($peralatanTelemetris[0]->namaAlat);
    }

    /**
     * @test
     */
    public function it_stores_the_jenis_peralatan_peralatan_telemetris(): void
    {
        $jenisPeralatan = JenisPeralatan::factory()->create();
        $data = PeralatanTelemetri::factory()
            ->make([
                'jenis_peralatan_id' => $jenisPeralatan->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.jenis-peralatans.peralatan-telemetris.store',
                $jenisPeralatan
            ),
            $data
        );

        $this->assertDatabaseHas('peralatan_telemetris', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $peralatanTelemetri = PeralatanTelemetri::latest('id')->first();

        $this->assertEquals(
            $jenisPeralatan->id,
            $peralatanTelemetri->jenis_peralatan_id
        );
    }
}
