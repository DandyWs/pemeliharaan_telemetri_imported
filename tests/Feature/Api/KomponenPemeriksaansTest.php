<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Komponen;
use App\Models\Pemeriksaan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KomponenPemeriksaansTest extends TestCase
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
    public function it_gets_komponen_pemeriksaans(): void
    {
        $komponen = Komponen::factory()->create();
        $pemeriksaans = Pemeriksaan::factory()
            ->count(2)
            ->create([
                'komponen_id' => $komponen->id,
            ]);

        $response = $this->getJson(
            route('api.komponens.pemeriksaans.index', $komponen)
        );

        $response->assertOk()->assertSee($pemeriksaans[0]->catatan);
    }

    /**
     * @test
     */
    public function it_stores_the_komponen_pemeriksaans(): void
    {
        $komponen = Komponen::factory()->create();
        $data = Pemeriksaan::factory()
            ->make([
                'komponen_id' => $komponen->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.komponens.pemeriksaans.store', $komponen),
            $data
        );

        $this->assertDatabaseHas('pemeriksaans', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $pemeriksaan = Pemeriksaan::latest('id')->first();

        $this->assertEquals($komponen->id, $pemeriksaan->komponen_id);
    }
}
