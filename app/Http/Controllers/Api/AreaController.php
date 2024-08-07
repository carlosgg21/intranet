<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaStoreRequest;
use App\Http\Requests\AreaUpdateRequest;
use App\Http\Resources\AreaCollection;
use App\Http\Resources\AreaResource;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AreaController extends Controller
{
    public function index(Request $request): AreaCollection
    {
        $this->authorize('view-any', Area::class);

        $search = $request->get('search', '');

        $areas = Area::search($search)
            ->latest()
            ->paginate();

        return new AreaCollection($areas);
    }

    public function store(AreaStoreRequest $request): AreaResource
    {
        $this->authorize('create', Area::class);

        $validated = $request->validated();

        $area = Area::create($validated);

        return new AreaResource($area);
    }

    public function show(Request $request, Area $area): AreaResource
    {
        $this->authorize('view', $area);

        return new AreaResource($area);
    }

    public function update(AreaUpdateRequest $request, Area $area): AreaResource
    {
        $this->authorize('update', $area);

        $validated = $request->validated();

        $area->update($validated);

        return new AreaResource($area);
    }

    public function destroy(Request $request, Area $area): Response
    {
        $this->authorize('delete', $area);

        $area->delete();

        return response()->noContent();
    }
}
