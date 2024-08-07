<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdTypeStoreRequest;
use App\Http\Requests\AdTypeUpdateRequest;
use App\Http\Resources\AdTypeCollection;
use App\Http\Resources\AdTypeResource;
use App\Models\AdType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdTypeController extends Controller
{
    public function index(Request $request): AdTypeCollection
    {
        $this->authorize('view-any', AdType::class);

        $search = $request->get('search', '');

        $adTypes = AdType::search($search)
            ->latest()
            ->paginate();

        return new AdTypeCollection($adTypes);
    }

    public function store(AdTypeStoreRequest $request): AdTypeResource
    {
        $this->authorize('create', AdType::class);

        $validated = $request->validated();

        $adType = AdType::create($validated);

        return new AdTypeResource($adType);
    }

    public function show(Request $request, AdType $adType): AdTypeResource
    {
        $this->authorize('view', $adType);

        return new AdTypeResource($adType);
    }

    public function update(
        AdTypeUpdateRequest $request,
        AdType $adType
    ): AdTypeResource {
        $this->authorize('update', $adType);

        $validated = $request->validated();

        $adType->update($validated);

        return new AdTypeResource($adType);
    }

    public function destroy(Request $request, AdType $adType): Response
    {
        $this->authorize('delete', $adType);

        $adType->delete();

        return response()->noContent();
    }
}
