<?php

namespace App\Http\Controllers\Api;

use App\Models\Komponen2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DetailKomponenResource;
use App\Http\Resources\DetailKomponenCollection;

class Komponen2DetailKomponensController extends Controller
{
    public function index(
        Request $request,
        Komponen2 $komponen2
    ): DetailKomponenCollection {
        $this->authorize('view', $komponen2);

        $search = $request->get('search', '');

        $detailKomponens = $komponen2
            ->detailKomponens()
            ->search($search)
            ->latest()
            ->paginate();

        return new DetailKomponenCollection($detailKomponens);
    }

    public function store(
        Request $request,
        Komponen2 $komponen2
    ): DetailKomponenResource {
        $this->authorize('create', DetailKomponen::class);

        $validated = $request->validate([
            'namadetail' => ['required', 'max:255', 'string'],
        ]);

        $detailKomponen = $komponen2->detailKomponens()->create($validated);

        return new DetailKomponenResource($detailKomponen);
    }
}
