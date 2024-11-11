<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Pemeliharaan2;
use App\Models\AlatTelemetri;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Pemeliharaan2StoreRequest;
use App\Http\Requests\Pemeliharaan2UpdateRequest;

class Pemeliharaan2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Pemeliharaan2::class);

        $search = $request->get('search', '');

        $pemeliharaan2s = Pemeliharaan2::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.pemeliharaan2s.index',
            compact('pemeliharaan2s', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Pemeliharaan2::class);

        $alatTelemetris = AlatTelemetri::pluck('lokasiStasiun', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.pemeliharaan2s.create',
            compact('alatTelemetris', 'users')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Pemeliharaan2StoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Pemeliharaan2::class);

        $validated = $request->validated();

        $pemeliharaan2 = Pemeliharaan2::create($validated);

        return redirect()
            ->route('pemeliharaan2s.edit', $pemeliharaan2)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Pemeliharaan2 $pemeliharaan2): View
    {
        $this->authorize('view', $pemeliharaan2);

        return view('app.pemeliharaan2s.show', compact('pemeliharaan2'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Pemeliharaan2 $pemeliharaan2): View
    {
        $this->authorize('update', $pemeliharaan2);

        $alatTelemetris = AlatTelemetri::pluck('lokasiStasiun', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.pemeliharaan2s.edit',
            compact('pemeliharaan2', 'alatTelemetris', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Pemeliharaan2UpdateRequest $request,
        Pemeliharaan2 $pemeliharaan2
    ): RedirectResponse {
        $this->authorize('update', $pemeliharaan2);

        $validated = $request->validated();

        $pemeliharaan2->update($validated);

        return redirect()
            ->route('pemeliharaan2s.edit', $pemeliharaan2)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Pemeliharaan2 $pemeliharaan2
    ): RedirectResponse {
        $this->authorize('delete', $pemeliharaan2);

        $pemeliharaan2->delete();

        return redirect()
            ->route('pemeliharaan2s.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
