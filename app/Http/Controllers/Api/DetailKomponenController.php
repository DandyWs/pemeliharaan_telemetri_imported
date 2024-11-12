<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\DetailKomponen;
use App\Http\Controllers\Controller;
use App\Http\Resources\DetailKomponenResource;
use App\Http\Resources\DetailKomponenCollection;
use App\Http\Requests\DetailKomponenStoreRequest;
use App\Http\Requests\DetailKomponenUpdateRequest;

class DetailKomponenController extends Controller
{
    public function index(Request $request): DetailKomponenCollection
    {
        $this->authorize('view-any', DetailKomponen::class);

        $search = $request->get('search', '');

        $detailKomponens = DetailKomponen::search($search)
            ->latest()
            ->paginate();

        return new DetailKomponenCollection($detailKomponens);
    }

    public function store(
        DetailKomponenStoreRequest $request
    ): DetailKomponenResource {
        $this->authorize('create', DetailKomponen::class);

        $validated = $request->validated();

        $detailKomponen = DetailKomponen::create($validated);

        return new DetailKomponenResource($detailKomponen);
    }

    public function show(
        Request $request,
        DetailKomponen $detailKomponen
    ): DetailKomponenResource {
        $this->authorize('view', $detailKomponen);

        return new DetailKomponenResource($detailKomponen);
    }

    public function update(
        DetailKomponenUpdateRequest $request,
        DetailKomponen $detailKomponen
    ): DetailKomponenResource {
        $this->authorize('update', $detailKomponen);

        $validated = $request->validated();

        $detailKomponen->update($validated);

        return new DetailKomponenResource($detailKomponen);
    }

    public function destroy(
        Request $request,
        DetailKomponen $detailKomponen
    ): Response {
        $this->authorize('delete', $detailKomponen);

        $detailKomponen->delete();

        return response()->noContent();
    }
}
