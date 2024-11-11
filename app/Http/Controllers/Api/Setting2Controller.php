<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting2;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Setting2Resource;
use App\Http\Resources\Setting2Collection;
use App\Http\Requests\Setting2StoreRequest;
use App\Http\Requests\Setting2UpdateRequest;

class Setting2Controller extends Controller
{
    public function index(Request $request): Setting2Collection
    {
        $this->authorize('view-any', Setting2::class);

        $search = $request->get('search', '');

        $setting2s = Setting2::search($search)
            ->latest()
            ->paginate();

        return new Setting2Collection($setting2s);
    }

    public function store(Setting2StoreRequest $request): Setting2Resource
    {
        $this->authorize('create', Setting2::class);

        $validated = $request->validated();

        $setting2 = Setting2::create($validated);

        return new Setting2Resource($setting2);
    }

    public function show(Request $request, Setting2 $setting2): Setting2Resource
    {
        $this->authorize('view', $setting2);

        return new Setting2Resource($setting2);
    }

    public function update(
        Setting2UpdateRequest $request,
        Setting2 $setting2
    ): Setting2Resource {
        $this->authorize('update', $setting2);

        $validated = $request->validated();

        $setting2->update($validated);

        return new Setting2Resource($setting2);
    }

    public function destroy(Request $request, Setting2 $setting2): Response
    {
        $this->authorize('delete', $setting2);

        $setting2->delete();

        return response()->noContent();
    }
}
