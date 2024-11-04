<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Pemeliharaan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPemeliharaansTest extends TestCase
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
    public function it_gets_user_pemeliharaans(): void
    {
        $user = User::factory()->create();
        $pemeliharaans = Pemeliharaan::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.pemeliharaans.index', $user)
        );

        $response
            ->assertOk()
            ->assertSee($pemeliharaans[0]->periodePemeliharaan);
    }

    /**
     * @test
     */
    public function it_stores_the_user_pemeliharaans(): void
    {
        $user = User::factory()->create();
        $data = Pemeliharaan::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.pemeliharaans.store', $user),
            $data
        );

        $this->assertDatabaseHas('pemeliharaans', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $pemeliharaan = Pemeliharaan::latest('id')->first();

        $this->assertEquals($user->id, $pemeliharaan->user_id);
    }
}
