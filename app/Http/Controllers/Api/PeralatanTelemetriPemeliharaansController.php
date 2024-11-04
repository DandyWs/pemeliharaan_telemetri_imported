<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PeralatanTelemetri;
use App\Http\Controllers\Controller;
use App\Http\Resources\PemeliharaanResource;
use App\Http\Resources\PemeliharaanCollection;

class PeralatanTelemetriPemeliharaansController extends Controller
{
    public function index(
        Request $request,
        PeralatanTelemetri $peralatanTelemetri
    ): PemeliharaanCollection {
        $this->authorize('view', $peralatanTelemetri);

        $search = $request->get('search', '');

        $pemeliharaans = $peralatanTelemetri
            ->pemeliharaans()
            ->search($search)
            ->latest()
            ->paginate();

        return new PemeliharaanCollection($pemeliharaans);
    }

    public function store(
        Request $request,
        PeralatanTelemetri $peralatanTelemetri
    ): PemeliharaanResource {
        $this->authorize('create', Pemeliharaan::class);

        $validated = $request->validate([
            'tanggalPemeliharan' => ['required', 'date'],
            'waktuMulaiPemeliharan' => ['required', 'date'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $pemeliharaan = $peralatanTelemetri
            ->pemeliharaans()
            ->create($validated);

        return new PemeliharaanResource($pemeliharaan);
    }
}
