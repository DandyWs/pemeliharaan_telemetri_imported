<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Pemeriksaan;
use App\Models\Pemeliharaan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PemeliharaanPemeriksaansTest extends TestCase
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
    public function it_gets_pemeliharaan_pemeriksaans(): void
    {
        $pemeliharaan = Pemeliharaan::factory()->create();
        $pemeriksaans = Pemeriksaan::factory()
            ->count(2)
            ->create([
                'pemeliharaan_id' => $pemeliharaan->id,
            ]);

        $response = $this->getJson(
            route('api.pemeliharaans.pemeriksaans.index', $pemeliharaan)
        );

        $response->assertOk()->assertSee($pemeriksaans[0]->catatan);
    }

    /**
     * @test
     */
    public function it_stores_the_pemeliharaan_pemeriksaans(): void
    {
        $pemeliharaan = Pemeliharaan::factory()->create();
        $data = Pemeriksaan::factory()
            ->make([
                'pemeliharaan_id' => $pemeliharaan->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.pemeliharaans.pemeriksaans.store', $pemeliharaan),
            $data
        );

        $this->assertDatabaseHas('pemeriksaans', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $pemeriksaan = Pemeriksaan::latest('id')->first();

        $this->assertEquals($pemeliharaan->id, $pemeriksaan->pemeliharaan_id);
    }
}
