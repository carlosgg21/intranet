<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppSectionStoreRequest;
use App\Http\Requests\AppSectionUpdateRequest;
use App\Http\Resources\AppSectionCollection;
use App\Http\Resources\AppSectionResource;
use App\Models\AppSection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AppSectionController extends Controller
{
    public function index(Request $request): AppSectionCollection
    {
        $this->authorize('view-any', AppSection::class);

        $search = $request->get('search', '');

        $appSections = AppSection::search($search)
            ->latest()
            ->paginate();

        return new AppSectionCollection($appSections);
    }

    public function store(AppSectionStoreRequest $request): AppSectionResource
    {
        $this->authorize('create', AppSection::class);

        $validated = $request->validated();

        $appSection = AppSection::create($validated);

        return new AppSectionResource($appSection);
    }

    public function show(
        Request $request,
        AppSection $appSection
    ): AppSectionResource {
        $this->authorize('view', $appSection);

        return new AppSectionResource($appSection);
    }

    public function update(
        AppSectionUpdateRequest $request,
        AppSection $appSection
    ): AppSectionResource {
        $this->authorize('update', $appSection);

        $validated = $request->validated();

        $appSection->update($validated);

        return new AppSectionResource($appSection);
    }

    public function destroy(Request $request, AppSection $appSection): Response
    {
        $this->authorize('delete', $appSection);

        $appSection->delete();

        return response()->noContent();
    }
}
