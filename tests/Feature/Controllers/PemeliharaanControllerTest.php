<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Pemeliharaan;

use App\Models\PeralatanTelemetri;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PemeliharaanControllerTest extends TestCase
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
    public function it_displays_index_view_with_pemeliharaans(): void
    {
        $pemeliharaans = Pemeliharaan::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('pemeliharaans.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.pemeliharaans.index')
            ->assertViewHas('pemeliharaans');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_pemeliharaan(): void
    {
        $response = $this->get(route('pemeliharaans.create'));

        $response->assertOk()->assertViewIs('app.pemeliharaans.create');
    }

    /**
     * @test
     */
    public function it_stores_the_pemeliharaan(): void
    {
        $data = Pemeliharaan::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('pemeliharaans.store'), $data);

        $this->assertDatabaseHas('pemeliharaans', $data);

        $pemeliharaan = Pemeliharaan::latest('id')->first();

        $response->assertRedirect(route('pemeliharaans.edit', $pemeliharaan));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_pemeliharaan(): void
    {
        $pemeliharaan = Pemeliharaan::factory()->create();

        $response = $this->get(route('pemeliharaans.show', $pemeliharaan));

        $response
            ->assertOk()
            ->assertViewIs('app.pemeliharaans.show')
            ->assertViewHas('pemeliharaan');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_pemeliharaan(): void
    {
        $pemeliharaan = Pemeliharaan::factory()->create();

        $response = $this->get(route('pemeliharaans.edit', $pemeliharaan));

        $response
            ->assertOk()
            ->assertViewIs('app.pemeliharaans.edit')
            ->assertViewHas('pemeliharaan');
    }

    /**
     * @test
     */
    public function it_updates_the_pemeliharaan(): void
    {
        $pemeliharaan = Pemeliharaan::factory()->create();

        $user = User::factory()->create();
        $peralatanTelemetri = PeralatanTelemetri::factory()->create();

        $data = [
            'tanggalPemeliharan' => $this->faker->dateTime('now', 'UTC'),
            'waktuMulaiPemeliharan' => $this->faker->dateTime('now', 'UTC'),
            'periodePemeliharaan' => $this->faker->text(255),
            'cuaca' => $this->faker->text(255),
            'no_AlatUkur' => $this->faker->randomNumber(),
            'no_GSM' => $this->faker->randomNumber(),
            'user_id' => $user->id,
            'peralatan_telemetri_id' => $peralatanTelemetri->id,
        ];

        $response = $this->put(
            route('pemeliharaans.update', $pemeliharaan),
            $data
        );

        $data['id'] = $pemeliharaan->id;

        $this->assertDatabaseHas('pemeliharaans', $data);

        $response->assertRedirect(route('pemeliharaans.edit', $pemeliharaan));
    }

    /**
     * @test
     */
    public function it_deletes_the_pemeliharaan(): void
    {
        $pemeliharaan = Pemeliharaan::factory()->create();

        $response = $this->delete(
            route('pemeliharaans.destroy', $pemeliharaan)
        );

        $response->assertRedirect(route('pemeliharaans.index'));

        $this->assertModelMissing($pemeliharaan);
    }
}
