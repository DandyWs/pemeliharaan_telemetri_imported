<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\JenisPeralatan;
use App\Http\Controllers\Controller;
use App\Http\Resources\PeralatanTelemetriResource;
use App\Http\Resources\PeralatanTelemetriCollection;

class JenisPeralatanPeralatanTelemetrisController extends Controller
{
    public function index(
        Request $request,
        JenisPeralatan $jenisPeralatan
    ): PeralatanTelemetriCollection {
        $this->authorize('view', $jenisPeralatan);

        $search = $request->get('search', '');

        $peralatanTelemetris = $jenisPeralatan
            ->peralatanTelemetris()
            ->search($search)
            ->latest()
            ->paginate();

        return new PeralatanTelemetriCollection($peralatanTelemetris);
    }

    public function store(
        Request $request,
        JenisPeralatan $jenisPeralatan
    ): PeralatanTelemetriResource {
        $this->authorize('create', PeralatanTelemetri::class);

        $validated = $request->validate([
            'namaAlat' => ['required', 'max:255', 'string'],
            'serialNumber' => ['required', 'max:255', 'string'],
            'lokasiStasiun' => ['required', 'max:255', 'string'],
        ]);

        $peralatanTelemetri = $jenisPeralatan
            ->peralatanTelemetris()
            ->create($validated);

        return new PeralatanTelemetriResource($peralatanTelemetri);
    }
}
