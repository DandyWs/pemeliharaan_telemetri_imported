<?php

namespace App\Http\Controllers\Api;

use App\Models\JenisAlat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\JenisAlatResource;
use App\Http\Resources\JenisAlatCollection; // Ensure this class exists in the specified namespace
use App\Http\Requests\JenisAlatStoreRequest;
use App\Http\Requests\JenisAlatUpdateRequest;

class JenisAlatController extends Controller
{
    public function index(Request $request): JenisAlatCollection
    {
        $this->authorize('view-any', JenisAlat::class);

        $search = $request->get('search', '');

        $jenisAlats = JenisAlat::search($search)
            ->latest()
            ->paginate();

        return new JenisAlatCollection($jenisAlats);
    }

    public function store(JenisAlatStoreRequest $request): JenisAlatResource
    {
        $this->authorize('create', JenisAlat::class);

        $validated = $request->validated();

        $jenisAlat = JenisAlat::create($validated);

        return new JenisAlatResource($jenisAlat);
    }

    public function show(
        Request $request,
        JenisAlat $jenisAlat
    ): JenisAlatResource {
        $this->authorize('view', $jenisAlat);

        return new JenisAlatResource($jenisAlat);
    }

    public function update(
        JenisAlatUpdateRequest $request,
        JenisAlat $jenisAlat
    ): JenisAlatResource {
        $this->authorize('update', $jenisAlat);

        $validated = $request->validated();

        $jenisAlat->update($validated);

        return new JenisAlatResource($jenisAlat);
    }

    public function destroy(Request $request, JenisAlat $jenisAlat): Response
    {
        $this->authorize('delete', $jenisAlat);

        $jenisAlat->delete();

        return response()->noContent();
    }
}
