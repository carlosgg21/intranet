<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkGroupStoreRequest;
use App\Http\Requests\WorkGroupUpdateRequest;
use App\Http\Resources\WorkGroupCollection;
use App\Http\Resources\WorkGroupResource;
use App\Models\WorkGroup;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WorkGroupController extends Controller
{
    public function index(Request $request): WorkGroupCollection
    {
        $this->authorize('view-any', WorkGroup::class);

        $search = $request->get('search', '');

        $workGroups = WorkGroup::search($search)
            ->latest()
            ->paginate();

        return new WorkGroupCollection($workGroups);
    }

    public function store(WorkGroupStoreRequest $request): WorkGroupResource
    {
        $this->authorize('create', WorkGroup::class);

        $validated = $request->validated();

        $workGroup = WorkGroup::create($validated);

        return new WorkGroupResource($workGroup);
    }

    public function show(
        Request $request,
        WorkGroup $workGroup
    ): WorkGroupResource {
        $this->authorize('view', $workGroup);

        return new WorkGroupResource($workGroup);
    }

    public function update(
        WorkGroupUpdateRequest $request,
        WorkGroup $workGroup
    ): WorkGroupResource {
        $this->authorize('update', $workGroup);

        $validated = $request->validated();

        $workGroup->update($validated);

        return new WorkGroupResource($workGroup);
    }

    public function destroy(Request $request, WorkGroup $workGroup): Response
    {
        $this->authorize('delete', $workGroup);

        $workGroup->delete();

        return response()->noContent();
    }
}
