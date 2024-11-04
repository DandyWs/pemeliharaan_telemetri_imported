<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PeralatanTelemetri;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Http\Resources\SettingCollection;

class PeralatanTelemetriSettingsController extends Controller
{
    public function index(
        Request $request,
        PeralatanTelemetri $peralatanTelemetri
    ): SettingCollection {
        $this->authorize('view', $peralatanTelemetri);

        $search = $request->get('search', '');

        $settings = $peralatanTelemetri
            ->settings()
            ->search($search)
            ->latest()
            ->paginate();

        return new SettingCollection($settings);
    }

    public function store(
        Request $request,
        PeralatanTelemetri $peralatanTelemetri
    ): SettingResource {
        $this->authorize('create', Setting::class);

        $validated = $request->validate([
            'namaSetting' => ['required', 'max:255', 'string'],
            'nilaiSebelumKalibrasi' => ['required', 'numeric'],
            'displaySebelumKalibrasi' => ['required', 'numeric'],
            'nilaiSetelahKalibrasi' => ['required', 'numeric'],
            'displaySetelahKalibrasi' => ['required', 'numeric'],
        ]);

        $setting = $peralatanTelemetri->settings()->create($validated);

        return new SettingResource($setting);
    }
}
