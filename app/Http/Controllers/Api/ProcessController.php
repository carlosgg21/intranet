<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessStoreRequest;
use App\Http\Requests\ProcessUpdateRequest;
use App\Http\Resources\ProcessCollection;
use App\Http\Resources\ProcessResource;
use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProcessController extends Controller
{
    public function index(Request $request): ProcessCollection
    {
        $this->authorize('view-any', Process::class);

        $search = $request->get('search', '');

        $processes = Process::search($search)
            ->latest()
            ->paginate();

        return new ProcessCollection($processes);
    }

    public function store(ProcessStoreRequest $request): ProcessResource
    {
        $this->authorize('create', Process::class);

        $validated = $request->validated();

        $process = Process::create($validated);

        return new ProcessResource($process);
    }

    public function show(Request $request, Process $process): ProcessResource
    {
        $this->authorize('view', $process);

        return new ProcessResource($process);
    }

    public function update(
        ProcessUpdateRequest $request,
        Process $process
    ): ProcessResource {
        $this->authorize('update', $process);

        $validated = $request->validated();

        $process->update($validated);

        return new ProcessResource($process);
    }

    public function destroy(Request $request, Process $process): Response
    {
        $this->authorize('delete', $process);

        $process->delete();

        return response()->noContent();
    }
}
