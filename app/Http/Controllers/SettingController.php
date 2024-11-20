<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Setting2;
use App\Models\FormKomponen;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\PeralatanTelemetri;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SettingStoreRequest;
use App\Http\Requests\SettingUpdateRequest;
use App\Models\AlatTelemetri;
use App\Models\DetailKomponen;
use App\Models\JenisAlat;
use App\Models\Pemeliharaan2;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Setting2::class);

        $search = $request->get('search', '');

        $settings = Setting2::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.settings.index', compact('settings', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Setting2::class);

        $formKomponens = FormKomponen::pluck('pemeliharaan2_id','detail_komponen_id', 'id','cheked');

        return view('app.settings.create', compact('formKomponens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Setting2::class);

        $validated = $request->validated();

        $setting = Setting2::create($validated);

        return redirect()
            ->route('settings.edit', $setting)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Setting2 $setting): View
    {
        $this->authorize('view', $setting);

        $formKomponen = FormKomponen::pluck('pemeliharaan2_id','detail_komponen_id','cheked', 'id');
        $detailKomponen = DetailKomponen::pluck('komponen2_id','namadetail','id');
        $pemeliharaan2 = Pemeliharaan2::pluck('tanggal','waktu','periode','cuaca','no_alatUkur','no_GSM','alat_telemetri_id','user_id','id');
        $alatTelemetri = AlatTelemetri::pluck('jenis_alat_id','lokasiStasiun','id');
        $jenisAlat = JenisAlat::pluck('namajenis','id');

        return view('app.settings.show', compact('setting', 'formKomponen', 'detailKomponen', 'pemeliharaan2', 'alat', 'jenisAlat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Setting2 $setting): View
    {
        $this->authorize('update', $setting);

        $formKomponens = FormKomponen::pluck('pemeliharaan2_id','detail_komponen_id','cheked', 'id');

        return view(
            'app.settings.edit',
            compact('setting', 'formKomponens')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SettingUpdateRequest $request,
        Setting2 $setting
    ): RedirectResponse {
        $this->authorize('update', $setting);

        $validated = $request->validated();

        $setting->update($validated);

        return redirect()
            ->route('settings.edit', $setting)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Setting2 $setting
    ): RedirectResponse {
        $this->authorize('delete', $setting);

        $setting->delete();

        return redirect()
            ->route('settings.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
