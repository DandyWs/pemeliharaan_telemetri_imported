<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Setting;
use App\Models\PeralatanTelemetri;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PeralatanTelemetriSettingsTest extends TestCase
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
    public function it_gets_peralatan_telemetri_settings(): void
    {
        $peralatanTelemetri = PeralatanTelemetri::factory()->create();
        $settings = Setting::factory()
            ->count(2)
            ->create([
                'peralatan_telemetri_id' => $peralatanTelemetri->id,
            ]);

        $response = $this->getJson(
            route(
                'api.peralatan-telemetris.settings.index',
                $peralatanTelemetri
            )
        );

        $response->assertOk()->assertSee($settings[0]->namaSetting);
    }

    /**
     * @test
     */
    public function it_stores_the_peralatan_telemetri_settings(): void
    {
        $peralatanTelemetri = PeralatanTelemetri::factory()->create();
        $data = Setting::factory()
            ->make([
                'peralatan_telemetri_id' => $peralatanTelemetri->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.peralatan-telemetris.settings.store',
                $peralatanTelemetri
            ),
            $data
        );

        $this->assertDatabaseHas('settings', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $setting = Setting::latest('id')->first();

        $this->assertEquals(
            $peralatanTelemetri->id,
            $setting->peralatan_telemetri_id
        );
    }
}
