<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\JenisPeralatan;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JenisPeralatanControllerTest extends TestCase
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
    public function it_displays_index_view_with_jenis_peralatans(): void
    {
        $jenisPeralatans = JenisPeralatan::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('jenis-peralatans.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.jenis_peralatans.index')
            ->assertViewHas('jenisPeralatans');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_jenis_peralatan(): void
    {
        $response = $this->get(route('jenis-peralatans.create'));

        $response->assertOk()->assertViewIs('app.jenis_peralatans.create');
    }

    /**
     * @test
     */
    public function it_stores_the_jenis_peralatan(): void
    {
        $data = JenisPeralatan::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('jenis-peralatans.store'), $data);

        $this->assertDatabaseHas('jenis_peralatans', $data);

        $jenisPeralatan = JenisPeralatan::latest('id')->first();

        $response->assertRedirect(
            route('jenis-peralatans.edit', $jenisPeralatan)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_jenis_peralatan(): void
    {
        $jenisPeralatan = JenisPeralatan::factory()->create();

        $response = $this->get(route('jenis-peralatans.show', $jenisPeralatan));

        $response
            ->assertOk()
            ->assertViewIs('app.jenis_peralatans.show')
            ->assertViewHas('jenisPeralatan');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_jenis_peralatan(): void
    {
        $jenisPeralatan = JenisPeralatan::factory()->create();

        $response = $this->get(route('jenis-peralatans.edit', $jenisPeralatan));

        $response
            ->assertOk()
            ->assertViewIs('app.jenis_peralatans.edit')
            ->assertViewHas('jenisPeralatan');
    }

    /**
     * @test
     */
    public function it_updates_the_jenis_peralatan(): void
    {
        $jenisPeralatan = JenisPeralatan::factory()->create();

        $data = [
            'namaJenisAlat' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('jenis-peralatans.update', $jenisPeralatan),
            $data
        );

        $data['id'] = $jenisPeralatan->id;

        $this->assertDatabaseHas('jenis_peralatans', $data);

        $response->assertRedirect(
            route('jenis-peralatans.edit', $jenisPeralatan)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_jenis_peralatan(): void
    {
        $jenisPeralatan = JenisPeralatan::factory()->create();

        $response = $this->delete(
            route('jenis-peralatans.destroy', $jenisPeralatan)
        );

        $response->assertRedirect(route('jenis-peralatans.index'));

        $this->assertModelMissing($jenisPeralatan);
    }
}
