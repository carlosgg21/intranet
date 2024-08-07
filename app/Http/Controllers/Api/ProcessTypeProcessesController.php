<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProcessCollection;
use App\Http\Resources\ProcessResource;
use App\Models\ProcessType;
use Illuminate\Http\Request;

class ProcessTypeProcessesController extends Controller
{
    public function index(
        Request $request,
        ProcessType $processType
    ): ProcessCollection {
        $this->authorize('view', $processType);

        $search = $request->get('search', '');

        $processes = $processType
            ->processes()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProcessCollection($processes);
    }

    public function store(
        Request $request,
        ProcessType $processType
    ): ProcessResource {
        $this->authorize('create', Process::class);

        $validated = $request->validate([
            'code' => [
                'required',
                'unique:processes,code',
                'max:255',
                'string',
            ],
            'name' => [
                'required',
                'unique:processes,name',
                'max:255',
                'string',
            ],
            'description' => ['nullable', 'max:255', 'string'],
            'parent_id'   => ['nullable', 'max:255'],
        ]);

        $process = $processType->processes()->create($validated);

        return new ProcessResource($process);
    }
}
