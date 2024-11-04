<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\JenisPeralatan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JenisPeralatanTest extends TestCase
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
    public function it_gets_jenis_peralatans_list(): void
    {
        $jenisPeralatans = JenisPeralatan::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.jenis-peralatans.index'));

        $response->assertOk()->assertSee($jenisPeralatans[0]->namaJenisAlat);
    }

    /**
     * @test
     */
    public function it_stores_the_jenis_peralatan(): void
    {
        $data = JenisPeralatan::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.jenis-peralatans.store'), $data);

        $this->assertDatabaseHas('jenis_peralatans', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.jenis-peralatans.update', $jenisPeralatan),
            $data
        );

        $data['id'] = $jenisPeralatan->id;

        $this->assertDatabaseHas('jenis_peralatans', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_jenis_peralatan(): void
    {
        $jenisPeralatan = JenisPeralatan::factory()->create();

        $response = $this->deleteJson(
            route('api.jenis-peralatans.destroy', $jenisPeralatan)
        );

        $this->assertModelMissing($jenisPeralatan);

        $response->assertNoContent();
    }
}
