<?php

namespace App\Http\Controllers\Api;

use App\Models\Komponen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\KomponenResource;
use App\Http\Resources\KomponenCollection;
use App\Http\Requests\KomponenStoreRequest;
use App\Http\Requests\KomponenUpdateRequest;

class KomponenController extends Controller
{
    public function index(Request $request): KomponenCollection
    {
        $this->authorize('view-any', Komponen::class);

        $search = $request->get('search', '');

        $komponens = Komponen::search($search)
            ->latest()
            ->paginate();

        return new KomponenCollection($komponens);
    }

    public function store(KomponenStoreRequest $request): KomponenResource
    {
        $this->authorize('create', Komponen::class);

        $validated = $request->validated();

        $komponen = Komponen::create($validated);

        return new KomponenResource($komponen);
    }

    public function show(Request $request, Komponen $komponen): KomponenResource
    {
        $this->authorize('view', $komponen);

        return new KomponenResource($komponen);
    }

    public function update(
        KomponenUpdateRequest $request,
        Komponen $komponen
    ): KomponenResource {
        $this->authorize('update', $komponen);

        $validated = $request->validated();

        $komponen->update($validated);

        return new KomponenResource($komponen);
    }

    public function destroy(Request $request, Komponen $komponen): Response
    {
        $this->authorize('delete', $komponen);

        $komponen->delete();

        return response()->noContent();
    }
}
