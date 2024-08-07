<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessStoreRequest;
use App\Http\Requests\ProcessUpdateRequest;
use App\Models\Area;
use App\Models\Process;
use App\Models\ProcessType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Process::class);

        $search = $request->get('search', '');

        $processes = Process::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.processes.index', compact('processes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Process::class);

        $processTypes = ProcessType::pluck('name', 'id');

        $areas = Area::get();

        return view('app.processes.create', compact('processTypes', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProcessStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Process::class);

        $validated = $request->validated();

        $process = Process::create($validated);

        $process->areas()->attach($request->areas);

        return redirect()
            ->route('processes.edit', $process)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Process $process): View
    {
        $this->authorize('view', $process);

        return view('app.processes.show', compact('process'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Process $process): View
    {
        $this->authorize('update', $process);

        $processTypes = ProcessType::pluck('name', 'id');

        $areas = Area::get();

        return view(
            'app.processes.edit',
            compact('process', 'processTypes', 'areas')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ProcessUpdateRequest $request,
        Process $process
    ): RedirectResponse {
        $this->authorize('update', $process);

        $validated = $request->validated();
        $process->areas()->sync($request->areas);

        $process->update($validated);

        return redirect()
            ->route('processes.edit', $process)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Process $process
    ): RedirectResponse {
        $this->authorize('delete', $process);

        $process->delete();

        return redirect()
            ->route('processes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
