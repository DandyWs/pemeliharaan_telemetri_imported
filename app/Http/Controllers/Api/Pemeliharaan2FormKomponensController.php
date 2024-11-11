<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Pemeliharaan2;
use App\Models\FormKomponen;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormKomponenResource;
use App\Http\Resources\FormKomponenCollection;

class Pemeliharaan2FormKomponensController extends Controller
{
    public function index(
        Request $request,
        Pemeliharaan2 $pemeliharaan2
    ): FormKomponenCollection {
        $this->authorize('view', $pemeliharaan2);

        $search = $request->get('search', '');

        $formKomponens = $pemeliharaan2
            ->formKomponens()
            ->search($search)
            ->latest()
            ->paginate();

        return new FormKomponenCollection($formKomponens);
    }

    public function store(
        Request $request,
        Pemeliharaan2 $pemeliharaan2
    ): FormKomponenResource {
        $this->authorize('create', FormKomponen::class);

        $validated = $request->validate([
            'detail_komponen_id' => ['required', 'exists:detail_komponens,id'],
            'cheked' => ['required', 'boolean'],
        ]);

        $formKomponen = $pemeliharaan2->formKomponens()->create($validated);

        return new FormKomponenResource($formKomponen);
    }
}
