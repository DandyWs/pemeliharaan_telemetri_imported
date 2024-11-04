<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PemeliharaanResource;
use App\Http\Resources\PemeliharaanCollection;

class UserPemeliharaansController extends Controller
{
    public function index(Request $request, User $user): PemeliharaanCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $pemeliharaans = $user
            ->pemeliharaans()
            ->search($search)
            ->latest()
            ->paginate();

        return new PemeliharaanCollection($pemeliharaans);
    }

    public function store(Request $request, User $user): PemeliharaanResource
    {
        $this->authorize('create', Pemeliharaan::class);

        $validated = $request->validate([
            'tanggalPemeliharan' => ['required', 'date'],
            'waktuMulaiPemeliharan' => ['required', 'date'],
            'peralatan_telemetri_id' => [
                'required',
                'exists:peralatan_telemetris,id',
            ],
        ]);

        $pemeliharaan = $user->pemeliharaans()->create($validated);

        return new PemeliharaanResource($pemeliharaan);
    }
}
