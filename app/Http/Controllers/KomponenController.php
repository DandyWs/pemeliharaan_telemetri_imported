<?php

namespace App\Http\Controllers;

use App\Models\Komponen;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\PeralatanTelemetri;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\KomponenStoreRequest;
use App\Http\Requests\KomponenUpdateRequest;

class KomponenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Komponen::class);

        $search = $request->get('search', '');

        $komponens = Komponen::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.komponens.index', compact('komponens', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Komponen::class);

        $peralatanTelemetris = PeralatanTelemetri::pluck('namaAlat', 'id');

        return view('app.komponens.create', compact('peralatanTelemetris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KomponenStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Komponen::class);

        $validated = $request->validated();

        $komponen = Komponen::create($validated);

        return redirect()
            ->route('komponens.edit', $komponen)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Komponen $komponen): View
    {
        $this->authorize('view', $komponen);

        return view('app.komponens.show', compact('komponen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Komponen $komponen): View
    {
        $this->authorize('update', $komponen);

        $peralatanTelemetris = PeralatanTelemetri::pluck('namaAlat', 'id');

        return view(
            'app.komponens.edit',
            compact('komponen', 'peralatanTelemetris')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        KomponenUpdateRequest $request,
        Komponen $komponen
    ): RedirectResponse {
        $this->authorize('update', $komponen);

        $validated = $request->validated();

        $komponen->update($validated);

        return redirect()
            ->route('komponens.edit', $komponen)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Komponen $komponen
    ): RedirectResponse {
        $this->authorize('delete', $komponen);

        $komponen->delete();

        return redirect()
            ->route('komponens.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
