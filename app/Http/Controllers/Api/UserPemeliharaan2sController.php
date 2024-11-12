<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pemeliharaan2;
use App\Http\Resources\Pemeliharaan2Resource;
use App\Http\Resources\Pemeliharaan2Collection;

class UserPemeliharaan2sController extends Controller
{
    public function index(Request $request, User $user): Pemeliharaan2Collection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $pemeliharaan2s = $user
            ->pemeliharaan2s()
            ->search($search)
            ->latest()
            ->paginate();

        return new Pemeliharaan2Collection($pemeliharaan2s);
    }

    public function store(Request $request, User $user): Pemeliharaan2Resource
    {
        $this->authorize('create', Pemeliharaan2::class);

        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'waktu' => ['required', 'date_format:H:i:s'],
            'periode' => ['required', 'max:255', 'string'],
            'cuaca' => ['required', 'max:255', 'string'],
            'no_alatUkur' => ['required', 'numeric'],
            'no_GSM' => ['required', 'numeric'],
            'alat_telemetri_id' => ['required', 'exists:alat_telemetris,id'],
        ]);

        $pemeliharaan2 = $user->pemeliharaan2s()->create($validated);

        return new Pemeliharaan2Resource($pemeliharaan2);
    }
}
