<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Pemeliharaan;

use App\Models\PeralatanTelemetri;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PemeliharaanTest extends TestCase
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
    public function it_gets_pemeliharaans_list(): void
    {
        $pemeliharaans = Pemeliharaan::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.pemeliharaans.index'));

        $response
            ->assertOk()
            ->assertSee($pemeliharaans[0]->periodePemeliharaan);
    }

    /**
     * @test
     */
    public function it_stores_the_pemeliharaan(): void
    {
        $data = Pemeliharaan::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.pemeliharaans.store'), $data);

        $this->assertDatabaseHas('pemeliharaans', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.pemeliharaans.update', $pemeliharaan),
            $data
        );

        $data['id'] = $pemeliharaan->id;

        $this->assertDatabaseHas('pemeliharaans', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_pemeliharaan(): void
    {
        $pemeliharaan = Pemeliharaan::factory()->create();

        $response = $this->deleteJson(
            route('api.pemeliharaans.destroy', $pemeliharaan)
        );

        $this->assertModelMissing($pemeliharaan);

        $response->assertNoContent();
    }
}
