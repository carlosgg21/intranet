<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessTypeStoreRequest;
use App\Http\Requests\ProcessTypeUpdateRequest;
use App\Http\Resources\ProcessTypeCollection;
use App\Http\Resources\ProcessTypeResource;
use App\Models\ProcessType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProcessTypeController extends Controller
{
    public function index(Request $request): ProcessTypeCollection
    {
        $this->authorize('view-any', ProcessType::class);

        $search = $request->get('search', '');

        $processTypes = ProcessType::search($search)
            ->latest()
            ->paginate();

        return new ProcessTypeCollection($processTypes);
    }

    public function store(ProcessTypeStoreRequest $request): ProcessTypeResource
    {
        $this->authorize('create', ProcessType::class);

        $validated = $request->validated();

        $processType = ProcessType::create($validated);

        return new ProcessTypeResource($processType);
    }

    public function show(
        Request $request,
        ProcessType $processType
    ): ProcessTypeResource {
        $this->authorize('view', $processType);

        return new ProcessTypeResource($processType);
    }

    public function update(
        ProcessTypeUpdateRequest $request,
        ProcessType $processType
    ): ProcessTypeResource {
        $this->authorize('update', $processType);

        $validated = $request->validated();

        $processType->update($validated);

        return new ProcessTypeResource($processType);
    }

    public function destroy(
        Request $request,
        ProcessType $processType
    ): Response {
        $this->authorize('delete', $processType);

        $processType->delete();

        return response()->noContent();
    }
}
