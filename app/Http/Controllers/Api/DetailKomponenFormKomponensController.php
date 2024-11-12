<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DetailKomponen;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormKomponenResource;
use App\Http\Resources\FormKomponenCollection;

class DetailKomponenFormKomponensController extends Controller
{
    public function index(
        Request $request,
        DetailKomponen $detailKomponen
    ): FormKomponenCollection {
        $this->authorize('view', $detailKomponen);

        $search = $request->get('search', '');

        $formKomponens = $detailKomponen
            ->formKomponens()
            ->search($search)
            ->latest()
            ->paginate();

        return new FormKomponenCollection($formKomponens);
    }

    public function store(
        Request $request,
        DetailKomponen $detailKomponen
    ): FormKomponenResource {
        $this->authorize('create', FormKomponen::class);

        $validated = $request->validate([
            'pemeliharaan2_id' => ['required', 'exists:pemeliharaan2s,id'],
            'cheked' => ['required', 'boolean'],
        ]);

        $formKomponen = $detailKomponen->formKomponens()->create($validated);

        return new FormKomponenResource($formKomponen);
    }
}
