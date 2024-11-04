<?php

namespace App\Http\Controllers\Api;

use App\Models\Pemeliharaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PemeriksaanResource;
use App\Http\Resources\PemeriksaanCollection;

class PemeliharaanPemeriksaansController extends Controller
{
    public function index(
        Request $request,
        Pemeliharaan $pemeliharaan
    ): PemeriksaanCollection {
        $this->authorize('view', $pemeliharaan);

        $search = $request->get('search', '');

        $pemeriksaans = $pemeliharaan
            ->pemeriksaans()
            ->search($search)
            ->latest()
            ->paginate();

        return new PemeriksaanCollection($pemeriksaans);
    }

    public function store(
        Request $request,
        Pemeliharaan $pemeliharaan
    ): PemeriksaanResource {
        $this->authorize('create', Pemeriksaan::class);

        $validated = $request->validate([
            'hasilPemeriksaan' => ['required', 'boolean'],
            'catatan' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'komponen_id' => ['nullable', 'exists:komponens,id'],
            'setting_id' => ['nullable', 'exists:settings,id'],
        ]);

        $pemeriksaan = $pemeliharaan->pemeriksaans()->create($validated);

        return new PemeriksaanResource($pemeriksaan);
    }
}
