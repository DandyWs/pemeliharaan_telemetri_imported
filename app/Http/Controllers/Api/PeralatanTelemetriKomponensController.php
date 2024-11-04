<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PeralatanTelemetri;
use App\Http\Controllers\Controller;
use App\Http\Resources\KomponenResource;
use App\Http\Resources\KomponenCollection;

class PeralatanTelemetriKomponensController extends Controller
{
    public function index(
        Request $request,
        PeralatanTelemetri $peralatanTelemetri
    ): KomponenCollection {
        $this->authorize('view', $peralatanTelemetri);

        $search = $request->get('search', '');

        $komponens = $peralatanTelemetri
            ->komponens()
            ->search($search)
            ->latest()
            ->paginate();

        return new KomponenCollection($komponens);
    }

    public function store(
        Request $request,
        PeralatanTelemetri $peralatanTelemetri
    ): KomponenResource {
        $this->authorize('create', Komponen::class);

        $validated = $request->validate([
            'namaKomponen' => ['required', 'max:255', 'string'],
            'indikatorLED' => ['nullable', 'boolean'],
            'simCard' => ['nullable', 'boolean'],
            'kondisiAlat' => ['nullable', 'boolean'],
            'sambunganKabel' => ['nullable', 'boolean'],
            'perawatanSonde' => ['nullable', 'boolean'],
            'testDanSettingRTC' => ['nullable', 'boolean'],
            'levelAirAki' => ['nullable', 'boolean'],
            'teganganBateraiAki' => ['nullable', 'max:255'],
        ]);

        $komponen = $peralatanTelemetri->komponens()->create($validated);

        return new KomponenResource($komponen);
    }
}
