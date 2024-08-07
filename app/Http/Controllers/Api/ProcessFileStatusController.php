<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessFileStatusStoreRequest;
use App\Http\Requests\ProcessFileStatusUpdateRequest;
use App\Http\Resources\ProcessFileStatusCollection;
use App\Http\Resources\ProcessFileStatusResource;
use App\Models\ProcessFileStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProcessFileStatusController extends Controller
{
    public function index(Request $request): ProcessFileStatusCollection
    {
        $this->authorize('view-any', ProcessFileStatus::class);

        $search = $request->get('search', '');

        $processFileStatuses = ProcessFileStatus::search($search)
            ->latest()
            ->paginate();

        return new ProcessFileStatusCollection($processFileStatuses);
    }

    public function store(
        ProcessFileStatusStoreRequest $request
    ): ProcessFileStatusResource {
        $this->authorize('create', ProcessFileStatus::class);

        $validated = $request->validated();

        $processFileStatus = ProcessFileStatus::create($validated);

        return new ProcessFileStatusResource($processFileStatus);
    }

    public function show(
        Request $request,
        ProcessFileStatus $processFileStatus
    ): ProcessFileStatusResource {
        $this->authorize('view', $processFileStatus);

        return new ProcessFileStatusResource($processFileStatus);
    }

    public function update(
        ProcessFileStatusUpdateRequest $request,
        ProcessFileStatus $processFileStatus
    ): ProcessFileStatusResource {
        $this->authorize('update', $processFileStatus);

        $validated = $request->validated();

        $processFileStatus->update($validated);

        return new ProcessFileStatusResource($processFileStatus);
    }

    public function destroy(
        Request $request,
        ProcessFileStatus $processFileStatus
    ): Response {
        $this->authorize('delete', $processFileStatus);

        $processFileStatus->delete();

        return response()->noContent();
    }
}
