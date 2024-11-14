<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\JenisPeralatan;
use App\Models\JenisAlat;
use App\Http\Controllers\Controller;
use App\Http\Resources\JenisPeralatanResource;
use App\Http\Resources\JenisPeralatanCollection;
use App\Http\Requests\JenisPeralatanStoreRequest;
use App\Http\Requests\JenisPeralatanUpdateRequest;

class JenisPeralatanController extends Controller
{
    public function index(Request $request): JenisPeralatanCollection
    {
        $this->authorize('view-any', JenisAlat::class);

        $search = $request->get('search', '');

        $jenisPeralatans = JenisAlat::search($search)
            ->latest()
            ->paginate();

        return new JenisPeralatanCollection($jenisPeralatans);
    }

    public function store(
        JenisPeralatanStoreRequest $request
    ): JenisPeralatanResource {
        $this->authorize('create', JenisAlat::class);

        $validated = $request->validated();

        $jenisPeralatan = JenisAlat::create($validated);

        return new JenisPeralatanResource($jenisPeralatan);
    }

    public function show(
        Request $request,
        JenisAlat $jenisPeralatan
    ): JenisPeralatanResource {
        $this->authorize('view', $jenisPeralatan);

        return new JenisPeralatanResource($jenisPeralatan);
    }

    public function update(
        JenisPeralatanUpdateRequest $request,
        JenisAlat $jenisPeralatan
    ): JenisPeralatanResource {
        $this->authorize('update', $jenisPeralatan);

        $validated = $request->validated();

        $jenisPeralatan->update($validated);

        return new JenisPeralatanResource($jenisPeralatan);
    }

    public function destroy(
        Request $request,
        JenisAlat $jenisPeralatan
    ): Response {
        $this->authorize('delete', $jenisPeralatan);

        $jenisPeralatan->delete();

        return response()->noContent();
    }
}
