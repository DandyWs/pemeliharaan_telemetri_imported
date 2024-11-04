<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Komponen;
use App\Models\PeralatanTelemetri;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PeralatanTelemetriKomponensTest extends TestCase
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
    public function it_gets_peralatan_telemetri_komponens(): void
    {
        $peralatanTelemetri = PeralatanTelemetri::factory()->create();
        $komponens = Komponen::factory()
            ->count(2)
            ->create([
                'peralatan_telemetri_id' => $peralatanTelemetri->id,
            ]);

        $response = $this->getJson(
            route(
                'api.peralatan-telemetris.komponens.index',
                $peralatanTelemetri
            )
        );

        $response->assertOk()->assertSee($komponens[0]->namaKomponen);
    }

    /**
     * @test
     */
    public function it_stores_the_peralatan_telemetri_komponens(): void
    {
        $peralatanTelemetri = PeralatanTelemetri::factory()->create();
        $data = Komponen::factory()
            ->make([
                'peralatan_telemetri_id' => $peralatanTelemetri->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.peralatan-telemetris.komponens.store',
                $peralatanTelemetri
            ),
            $data
        );

        $this->assertDatabaseHas('komponens', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $komponen = Komponen::latest('id')->first();

        $this->assertEquals(
            $peralatanTelemetri->id,
            $komponen->peralatan_telemetri_id
        );
    }
}
