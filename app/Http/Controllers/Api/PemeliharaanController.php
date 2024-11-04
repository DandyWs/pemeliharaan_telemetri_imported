<?php

namespace App\Http\Controllers\Api;

use App\Models\Pemeliharaan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\PemeliharaanResource;
use App\Http\Resources\PemeliharaanCollection;
use App\Http\Requests\PemeliharaanStoreRequest;
use App\Http\Requests\PemeliharaanUpdateRequest;

class PemeliharaanController extends Controller
{
    public function index(Request $request): PemeliharaanCollection
    {
        $this->authorize('view-any', Pemeliharaan::class);

        $search = $request->get('search', '');

        $pemeliharaans = Pemeliharaan::search($search)
            ->latest()
            ->paginate();

        return new PemeliharaanCollection($pemeliharaans);
    }

    public function store(
        PemeliharaanStoreRequest $request
    ): PemeliharaanResource {
        $this->authorize('create', Pemeliharaan::class);

        $validated = $request->validated();

        $pemeliharaan = Pemeliharaan::create($validated);

        return new PemeliharaanResource($pemeliharaan);
    }

    public function show(
        Request $request,
        Pemeliharaan $pemeliharaan
    ): PemeliharaanResource {
        $this->authorize('view', $pemeliharaan);

        return new PemeliharaanResource($pemeliharaan);
    }

    public function update(
        PemeliharaanUpdateRequest $request,
        Pemeliharaan $pemeliharaan
    ): PemeliharaanResource {
        $this->authorize('update', $pemeliharaan);

        $validated = $request->validated();

        $pemeliharaan->update($validated);

        return new PemeliharaanResource($pemeliharaan);
    }

    public function destroy(
        Request $request,
        Pemeliharaan $pemeliharaan
    ): Response {
        $this->authorize('delete', $pemeliharaan);

        $pemeliharaan->delete();

        return response()->noContent();
    }
}
