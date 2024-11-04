<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Setting;
use App\Models\Pemeriksaan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SettingPemeriksaansTest extends TestCase
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
    public function it_gets_setting_pemeriksaans(): void
    {
        $setting = Setting::factory()->create();
        $pemeriksaans = Pemeriksaan::factory()
            ->count(2)
            ->create([
                'setting_id' => $setting->id,
            ]);

        $response = $this->getJson(
            route('api.settings.pemeriksaans.index', $setting)
        );

        $response->assertOk()->assertSee($pemeriksaans[0]->catatan);
    }

    /**
     * @test
     */
    public function it_stores_the_setting_pemeriksaans(): void
    {
        $setting = Setting::factory()->create();
        $data = Pemeriksaan::factory()
            ->make([
                'setting_id' => $setting->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.settings.pemeriksaans.store', $setting),
            $data
        );

        $this->assertDatabaseHas('pemeriksaans', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $pemeriksaan = Pemeriksaan::latest('id')->first();

        $this->assertEquals($setting->id, $pemeriksaan->setting_id);
    }
}
