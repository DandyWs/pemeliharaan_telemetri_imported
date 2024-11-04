<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Komponen;

use App\Models\PeralatanTelemetri;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KomponenControllerTest extends TestCase
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
    public function it_displays_index_view_with_komponens(): void
    {
        $komponens = Komponen::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('komponens.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.komponens.index')
            ->assertViewHas('komponens');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_komponen(): void
    {
        $response = $this->get(route('komponens.create'));

        $response->assertOk()->assertViewIs('app.komponens.create');
    }

    /**
     * @test
     */
    public function it_stores_the_komponen(): void
    {
        $data = Komponen::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('komponens.store'), $data);

        $this->assertDatabaseHas('komponens', $data);

        $komponen = Komponen::latest('id')->first();

        $response->assertRedirect(route('komponens.edit', $komponen));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_komponen(): void
    {
        $komponen = Komponen::factory()->create();

        $response = $this->get(route('komponens.show', $komponen));

        $response
            ->assertOk()
            ->assertViewIs('app.komponens.show')
            ->assertViewHas('komponen');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_komponen(): void
    {
        $komponen = Komponen::factory()->create();

        $response = $this->get(route('komponens.edit', $komponen));

        $response
            ->assertOk()
            ->assertViewIs('app.komponens.edit')
            ->assertViewHas('komponen');
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

        $response = $this->put(route('komponens.update', $komponen), $data);

        $data['id'] = $komponen->id;

        $this->assertDatabaseHas('komponens', $data);

        $response->assertRedirect(route('komponens.edit', $komponen));
    }

    /**
     * @test
     */
    public function it_deletes_the_komponen(): void
    {
        $komponen = Komponen::factory()->create();

        $response = $this->delete(route('komponens.destroy', $komponen));

        $response->assertRedirect(route('komponens.index'));

        $this->assertModelMissing($komponen);
    }
}
