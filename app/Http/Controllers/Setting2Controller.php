<?php

namespace App\Http\Controllers;

use App\Models\Setting2;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\FormKomponen;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Setting2StoreRequest;
use App\Http\Requests\Setting2UpdateRequest;

class Setting2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Setting2::class);

        $search = $request->get('search', '');

        $setting2s = Setting2::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.setting2s.index', compact('setting2s', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Setting2::class);

        $formKomponens = FormKomponen::pluck('id', 'id');

        return view('app.setting2s.create', compact('formKomponens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Setting2StoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Setting2::class);

        $validated = $request->validated();

        $setting2 = Setting2::create($validated);

        return redirect()
            ->route('setting2s.edit', $setting2)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Setting2 $setting2): View
    {
        $this->authorize('view', $setting2);

        return view('app.setting2s.show', compact('setting2'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Setting2 $setting2): View
    {
        $this->authorize('update', $setting2);

        $formKomponens = FormKomponen::pluck('id', 'id');

        return view('app.setting2s.edit', compact('setting2', 'formKomponens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Setting2UpdateRequest $request,
        Setting2 $setting2
    ): RedirectResponse {
        $this->authorize('update', $setting2);

        $validated = $request->validated();

        $setting2->update($validated);

        return redirect()
            ->route('setting2s.edit', $setting2)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Setting2 $setting2
    ): RedirectResponse {
        $this->authorize('delete', $setting2);

        $setting2->delete();

        return redirect()
            ->route('setting2s.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
