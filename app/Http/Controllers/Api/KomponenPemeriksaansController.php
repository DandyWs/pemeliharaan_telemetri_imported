<?php

namespace App\Http\Controllers\Api;

use App\Models\Komponen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PemeriksaanResource;
use App\Http\Resources\PemeriksaanCollection;

class KomponenPemeriksaansController extends Controller
{
    public function index(
        Request $request,
        Komponen $komponen
    ): PemeriksaanCollection {
        $this->authorize('view', $komponen);

        $search = $request->get('search', '');

        $pemeriksaans = $komponen
            ->pemeriksaans()
            ->search($search)
            ->latest()
            ->paginate();

        return new PemeriksaanCollection($pemeriksaans);
    }

    public function store(
        Request $request,
        Komponen $komponen
    ): PemeriksaanResource {
        $this->authorize('create', Pemeriksaan::class);

        $validated = $request->validate([
            'hasilPemeriksaan' => ['required', 'boolean'],
            'catatan' => ['required', 'max:255', 'string'],
            'pemeliharaan_id' => ['required', 'exists:pemeliharaans,id'],
            'user_id' => ['required', 'exists:users,id'],
            'setting_id' => ['nullable', 'exists:settings,id'],
        ]);

        $pemeriksaan = $komponen->pemeriksaans()->create($validated);

        return new PemeriksaanResource($pemeriksaan);
    }
}
