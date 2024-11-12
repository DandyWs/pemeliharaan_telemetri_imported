<?php

namespace App\Http\Controllers\Api;

use App\Models\Komponen2;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Komponen2Resource;
use App\Http\Resources\Komponen2Collection;
use App\Http\Requests\Komponen2StoreRequest;
use App\Http\Requests\Komponen2UpdateRequest;

class Komponen2Controller extends Controller
{
    public function index(Request $request): Komponen2Collection
    {
        $this->authorize('view-any', Komponen2::class);

        $search = $request->get('search', '');

        $komponen2s = Komponen2::search($search)
            ->latest()
            ->paginate();

        return new Komponen2Collection($komponen2s);
    }

    public function store(Komponen2StoreRequest $request): Komponen2Resource
    {
        $this->authorize('create', Komponen2::class);

        $validated = $request->validated();

        $komponen2 = Komponen2::create($validated);

        return new Komponen2Resource($komponen2);
    }

    public function show(
        Request $request,
        Komponen2 $komponen2
    ): Komponen2Resource {
        $this->authorize('view', $komponen2);

        return new Komponen2Resource($komponen2);
    }

    public function update(
        Komponen2UpdateRequest $request,
        Komponen2 $komponen2
    ): Komponen2Resource {
        $this->authorize('update', $komponen2);

        $validated = $request->validated();

        $komponen2->update($validated);

        return new Komponen2Resource($komponen2);
    }

    public function destroy(Request $request, Komponen2 $komponen2): Response
    {
        $this->authorize('delete', $komponen2);

        $komponen2->delete();

        return response()->noContent();
    }
}
