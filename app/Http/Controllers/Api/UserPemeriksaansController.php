<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PemeriksaanResource;
use App\Http\Resources\PemeriksaanCollection;

class UserPemeriksaansController extends Controller
{
    public function index(Request $request, User $user): PemeriksaanCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $pemeriksaans = $user
            ->pemeriksaans()
            ->search($search)
            ->latest()
            ->paginate();

        return new PemeriksaanCollection($pemeriksaans);
    }

    public function store(Request $request, User $user): PemeriksaanResource
    {
        $this->authorize('create', Pemeriksaan::class);

        $validated = $request->validate([
            'hasilPemeriksaan' => ['required', 'boolean'],
            'catatan' => ['required', 'max:255', 'string'],
            'pemeliharaan_id' => ['required', 'exists:pemeliharaans,id'],
            'komponen_id' => ['nullable', 'exists:komponens,id'],
            'setting_id' => ['nullable', 'exists:settings,id'],
        ]);

        $pemeriksaan = $user->pemeriksaans()->create($validated);

        return new PemeriksaanResource($pemeriksaan);
    }
}
