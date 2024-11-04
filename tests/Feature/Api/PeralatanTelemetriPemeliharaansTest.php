<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Pemeliharaan;
use App\Models\PeralatanTelemetri;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PeralatanTelemetriPemeliharaansTest extends TestCase
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
    public function it_gets_peralatan_telemetri_pemeliharaans(): void
    {
        $peralatanTelemetri = PeralatanTelemetri::factory()->create();
        $pemeliharaans = Pemeliharaan::factory()
            ->count(2)
            ->create([
                'peralatan_telemetri_id' => $peralatanTelemetri->id,
            ]);

        $response = $this->getJson(
            route(
                'api.peralatan-telemetris.pemeliharaans.index',
                $peralatanTelemetri
            )
        );

        $response
            ->assertOk()
            ->assertSee($pemeliharaans[0]->periodePemeliharaan);
    }

    /**
     * @test
     */
    public function it_stores_the_peralatan_telemetri_pemeliharaans(): void
    {
        $peralatanTelemetri = PeralatanTelemetri::factory()->create();
        $data = Pemeliharaan::factory()
            ->make([
                'peralatan_telemetri_id' => $peralatanTelemetri->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.peralatan-telemetris.pemeliharaans.store',
                $peralatanTelemetri
            ),
            $data
        );

        $this->assertDatabaseHas('pemeliharaans', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $pemeliharaan = Pemeliharaan::latest('id')->first();

        $this->assertEquals(
            $peralatanTelemetri->id,
            $pemeliharaan->peralatan_telemetri_id
        );
    }
}
