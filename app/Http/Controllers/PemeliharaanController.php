<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Pemeliharaan;
use Illuminate\Http\Request;
use App\Models\PeralatanTelemetri;
use App\Models\Komponen2;
use App\Models\AlatTelemetri;
use App\Models\JenisAlat;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PemeliharaanExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PemeliharaanStoreRequest;
use App\Http\Requests\PemeliharaanUpdateRequest;
use App\Models\DetailKomponen;

class PemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Pemeliharaan::class);

        $search = $request->get('search', '');

        $pemeliharaans = Pemeliharaan::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.pemeliharaans.index',
            compact('pemeliharaans', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Pemeliharaan::class);

        $users = User::pluck('name', 'id');
        $alatTelemetri = AlatTelemetri::pluck('lokasiStasiun', 'id');
        $jenisAlat = JenisAlat::pluck('namajenis', 'id');
        $komponen2 = Komponen2::pluck('nama', 'id');
        $detailKomponen = DetailKomponen::all();
        return view(
            'app.pemeliharaans.create',
            compact('users', 'alatTelemetri','komponen2','detailKomponen', 'jenisAlat')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PemeliharaanStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Pemeliharaan::class);

        $validated = $request->validated();

        $pemeliharaan = Pemeliharaan::create($validated);

        return redirect()
            ->route('pemeliharaans.edit', $pemeliharaan)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Pemeliharaan $pemeliharaan): View
    {
        $this->authorize('view', $pemeliharaan);
        $komponen2 = Komponen2::pluck('nama', 'id');
        $detailKomponen = DetailKomponen::all();


        return view('app.pemeliharaans.show', compact('pemeliharaan', 'komponen2', 'detailKomponen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Pemeliharaan $pemeliharaan): View
    {
        $this->authorize('update', $pemeliharaan);

        $users = User::pluck('name', 'id');
        $peralatanTelemetris = PeralatanTelemetri::pluck('namaAlat', 'id');
        $komponen2 = Komponen2::pluck('nama', 'id');
        $detailKomponen = DetailKomponen::all();

        return view(
            'app.pemeliharaans.edit',
            compact('pemeliharaan', 'users', 'peralatanTelemetris', 'komponen2', 'detailKomponen')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        PemeliharaanUpdateRequest $request,
        Pemeliharaan $pemeliharaan
    ): RedirectResponse {
        $this->authorize('update', $pemeliharaan);

        $validated = $request->validated();

        $pemeliharaan->update($validated);

        return redirect()
            ->route('pemeliharaans.edit', $pemeliharaan)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Pemeliharaan $pemeliharaan
    ): RedirectResponse {
        $this->authorize('delete', $pemeliharaan);

        $pemeliharaan->delete();

        return redirect()
            ->route('pemeliharaans.index')
            ->withSuccess(__('crud.common.removed'));
    }public function export(Request $request, $format)
    {
        $this->authorize('view-any', Pemeliharaan::class);

        $pemeliharaans = Pemeliharaan::all();

        if ($format === 'pdf') {
            $pdf = Pdf::loadView('app.pemeliharaans.export_pdf', compact('pemeliharaans'));
            return $pdf->download('pemeliharaan_list.pdf');
        } elseif ($format === 'xlsx') {
            return Excel::download(new PemeliharaanExport, 'pemeliharaan_list.xlsx');
        }

        return redirect()->route('pemeliharaans.index')
            ->withErrors(__('crud.common.export_failed'));
    }


}
