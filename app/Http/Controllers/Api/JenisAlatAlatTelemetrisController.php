<?php

namespace App\Http\Controllers\Api;

use App\Models\JenisAlat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AlatTelemetriResource;
use App\Http\Resources\AlatTelemetriCollection;

class JenisAlatAlatTelemetrisController extends Controller
{
    public function index(
        Request $request,
        JenisAlat $jenisAlat
    ): AlatTelemetriCollection {
        $this->authorize('view', $jenisAlat);

        $search = $request->get('search', '');

        $alatTelemetris = $jenisAlat
            ->alatTelemetris()
            ->search($search)
            ->latest()
            ->paginate();

        return new AlatTelemetriCollection($alatTelemetris);
    }

    public function store(
        Request $request,
        JenisAlat $jenisAlat
    ): AlatTelemetriResource {
        $this->authorize('create', AlatTelemetri::class);

        $validated = $request->validate([
            'lokasiStasiun' => ['required', 'max:255', 'string'],
        ]);

        $alatTelemetri = $jenisAlat->alatTelemetris()->create($validated);

        return new AlatTelemetriResource($alatTelemetri);
    }
}
