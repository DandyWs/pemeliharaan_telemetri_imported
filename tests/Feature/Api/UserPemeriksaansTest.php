<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Pemeriksaan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPemeriksaansTest extends TestCase
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
    public function it_gets_user_pemeriksaans(): void
    {
        $user = User::factory()->create();
        $pemeriksaans = Pemeriksaan::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.pemeriksaans.index', $user)
        );

        $response->assertOk()->assertSee($pemeriksaans[0]->catatan);
    }

    /**
     * @test
     */
    public function it_stores_the_user_pemeriksaans(): void
    {
        $user = User::factory()->create();
        $data = Pemeriksaan::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.pemeriksaans.store', $user),
            $data
        );

        $this->assertDatabaseHas('pemeriksaans', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $pemeriksaan = Pemeriksaan::latest('id')->first();

        $this->assertEquals($user->id, $pemeriksaan->user_id);
    }
}
