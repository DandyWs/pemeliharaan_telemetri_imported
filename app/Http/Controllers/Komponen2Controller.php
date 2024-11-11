<?php

namespace App\Http\Controllers;

use App\Models\Komponen2;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Komponen2StoreRequest;
use App\Http\Requests\Komponen2UpdateRequest;

class Komponen2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Komponen2::class);

        $search = $request->get('search', '');

        $komponen2s = Komponen2::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.komponen2s.index', compact('komponen2s', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Komponen2::class);

        return view('app.komponen2s.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Komponen2StoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Komponen2::class);

        $validated = $request->validated();

        $komponen2 = Komponen2::create($validated);

        return redirect()
            ->route('komponen2s.edit', $komponen2)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Komponen2 $komponen2): View
    {
        $this->authorize('view', $komponen2);

        return view('app.komponen2s.show', compact('komponen2'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Komponen2 $komponen2): View
    {
        $this->authorize('update', $komponen2);

        return view('app.komponen2s.edit', compact('komponen2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Komponen2UpdateRequest $request,
        Komponen2 $komponen2
    ): RedirectResponse {
        $this->authorize('update', $komponen2);

        $validated = $request->validated();

        $komponen2->update($validated);

        return redirect()
            ->route('komponen2s.edit', $komponen2)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Komponen2 $komponen2
    ): RedirectResponse {
        $this->authorize('delete', $komponen2);

        $komponen2->delete();

        return redirect()
            ->route('komponen2s.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
