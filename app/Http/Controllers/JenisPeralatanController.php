<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\JenisPeralatan;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\JenisPeralatanStoreRequest;
use App\Http\Requests\JenisPeralatanUpdateRequest;

class JenisPeralatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', JenisPeralatan::class);

        $search = $request->get('search', '');

        $jenisPeralatans = JenisPeralatan::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.jenis_peralatans.index',
            compact('jenisPeralatans', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', JenisPeralatan::class);

        return view('app.jenis_peralatans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JenisPeralatanStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', JenisPeralatan::class);

        $validated = $request->validated();

        $jenisPeralatan = JenisPeralatan::create($validated);

        return redirect()
            ->route('jenis-peralatans.edit', $jenisPeralatan)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, JenisPeralatan $jenisPeralatan): View
    {
        $this->authorize('view', $jenisPeralatan);

        return view('app.jenis_peralatans.show', compact('jenisPeralatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, JenisPeralatan $jenisPeralatan): View
    {
        $this->authorize('update', $jenisPeralatan);

        return view('app.jenis_peralatans.edit', compact('jenisPeralatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        JenisPeralatanUpdateRequest $request,
        JenisPeralatan $jenisPeralatan
    ): RedirectResponse {
        $this->authorize('update', $jenisPeralatan);

        $validated = $request->validated();

        $jenisPeralatan->update($validated);

        return redirect()
            ->route('jenis-peralatans.edit', $jenisPeralatan)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        JenisPeralatan $jenisPeralatan
    ): RedirectResponse {
        $this->authorize('delete', $jenisPeralatan);

        $jenisPeralatan->delete();

        return redirect()
            ->route('jenis-peralatans.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
