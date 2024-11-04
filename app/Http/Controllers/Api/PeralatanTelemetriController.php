<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\PeralatanTelemetri;
use App\Http\Controllers\Controller;
use App\Http\Resources\PeralatanTelemetriResource;
use App\Http\Resources\PeralatanTelemetriCollection;
use App\Http\Requests\PeralatanTelemetriStoreRequest;
use App\Http\Requests\PeralatanTelemetriUpdateRequest;

class PeralatanTelemetriController extends Controller
{
    public function index(Request $request): PeralatanTelemetriCollection
    {
        $this->authorize('view-any', PeralatanTelemetri::class);

        $search = $request->get('search', '');

        $peralatanTelemetris = PeralatanTelemetri::search($search)
            ->latest()
            ->paginate();

        return new PeralatanTelemetriCollection($peralatanTelemetris);
    }

    public function store(
        PeralatanTelemetriStoreRequest $request
    ): PeralatanTelemetriResource {
        $this->authorize('create', PeralatanTelemetri::class);

        $validated = $request->validated();

        $peralatanTelemetri = PeralatanTelemetri::create($validated);

        return new PeralatanTelemetriResource($peralatanTelemetri);
    }

    public function show(
        Request $request,
        PeralatanTelemetri $peralatanTelemetri
    ): PeralatanTelemetriResource {
        $this->authorize('view', $peralatanTelemetri);

        return new PeralatanTelemetriResource($peralatanTelemetri);
    }

    public function update(
        PeralatanTelemetriUpdateRequest $request,
        PeralatanTelemetri $peralatanTelemetri
    ): PeralatanTelemetriResource {
        $this->authorize('update', $peralatanTelemetri);

        $validated = $request->validated();

        $peralatanTelemetri->update($validated);

        return new PeralatanTelemetriResource($peralatanTelemetri);
    }

    public function destroy(
        Request $request,
        PeralatanTelemetri $peralatanTelemetri
    ): Response {
        $this->authorize('delete', $peralatanTelemetri);

        $peralatanTelemetri->delete();

        return response()->noContent();
    }
}
