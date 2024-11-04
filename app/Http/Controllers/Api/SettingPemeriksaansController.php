<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PemeriksaanResource;
use App\Http\Resources\PemeriksaanCollection;

class SettingPemeriksaansController extends Controller
{
    public function index(
        Request $request,
        Setting $setting
    ): PemeriksaanCollection {
        $this->authorize('view', $setting);

        $search = $request->get('search', '');

        $pemeriksaans = $setting
            ->pemeriksaans()
            ->search($search)
            ->latest()
            ->paginate();

        return new PemeriksaanCollection($pemeriksaans);
    }

    public function store(
        Request $request,
        Setting $setting
    ): PemeriksaanResource {
        $this->authorize('create', Pemeriksaan::class);

        $validated = $request->validate([
            'hasilPemeriksaan' => ['required', 'boolean'],
            'catatan' => ['required', 'max:255', 'string'],
            'pemeliharaan_id' => ['required', 'exists:pemeliharaans,id'],
            'user_id' => ['required', 'exists:users,id'],
            'komponen_id' => ['nullable', 'exists:komponens,id'],
        ]);

        $pemeriksaan = $setting->pemeriksaans()->create($validated);

        return new PemeriksaanResource($pemeriksaan);
    }
}
