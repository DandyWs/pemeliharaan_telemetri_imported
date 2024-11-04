<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PeralatanTelemetri;

use App\Models\JenisPeralatan;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PeralatanTelemetriControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_peralatan_telemetris(): void
    {
        $peralatanTelemetris = PeralatanTelemetri::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('peralatan-telemetris.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.peralatan_telemetris.index')
            ->assertViewHas('peralatanTelemetris');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_peralatan_telemetri(): void
    {
        $response = $this->get(route('peralatan-telemetris.create'));

        $response->assertOk()->assertViewIs('app.peralatan_telemetris.create');
    }

    /**
     * @test
     */
    public function it_stores_the_peralatan_telemetri(): void
    {
        $data = PeralatanTelemetri::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('peralatan-telemetris.store'), $data);

        $this->assertDatabaseHas('peralatan_telemetris', $data);

        $peralatanTelemetri = PeralatanTelemetri::latest('id')->first();

        $response->assertRedirect(
            route('peralatan-telemetris.edit', $peralatanTelemetri)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_peralatan_telemetri(): void
    {
        $peralatanTelemetri = PeralatanTelemetri::factory()->create();

        $response = $this->get(
            route('peralatan-telemetris.show', $peralatanTelemetri)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.peralatan_telemetris.show')
            ->assertViewHas('peralatanTelemetri');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_peralatan_telemetri(): void
    {
        $peralatanTelemetri = PeralatanTelemetri::factory()->create();

        $response = $this->get(
            route('peralatan-telemetris.edit', $peralatanTelemetri)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.peralatan_telemetris.edit')
            ->assertViewHas('peralatanTelemetri');
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

        $response = $this->put(
            route('peralatan-telemetris.update', $peralatanTelemetri),
            $data
        );

        $data['id'] = $peralatanTelemetri->id;

        $this->assertDatabaseHas('peralatan_telemetris', $data);

        $response->assertRedirect(
            route('peralatan-telemetris.edit', $peralatanTelemetri)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_peralatan_telemetri(): void
    {
        $peralatanTelemetri = PeralatanTelemetri::factory()->create();

        $response = $this->delete(
            route('peralatan-telemetris.destroy', $peralatanTelemetri)
        );

        $response->assertRedirect(route('peralatan-telemetris.index'));

        $this->assertModelMissing($peralatanTelemetri);
    }
}
