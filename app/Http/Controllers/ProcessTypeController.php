<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessTypeStoreRequest;
use App\Http\Requests\ProcessTypeUpdateRequest;
use App\Models\ProcessType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProcessTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ProcessType::class);

        $search = $request->get('search', '');

        $processTypes = ProcessType::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.process_types.index',
            compact('processTypes', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ProcessType::class);

        return view('app.process_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProcessTypeStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', ProcessType::class);

        $validated = $request->validated();

        $processType = ProcessType::create($validated);

        return redirect()
            ->route('process-types.edit', $processType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ProcessType $processType): View
    {
        $this->authorize('view', $processType);

        return view('app.process_types.show', compact('processType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ProcessType $processType): View
    {
        $this->authorize('update', $processType);

        return view('app.process_types.edit', compact('processType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ProcessTypeUpdateRequest $request,
        ProcessType $processType
    ): RedirectResponse {
        $this->authorize('update', $processType);

        $validated = $request->validated();

        $processType->update($validated);

        return redirect()
            ->route('process-types.edit', $processType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ProcessType $processType
    ): RedirectResponse {
        $this->authorize('delete', $processType);

        $processType->delete();

        return redirect()
            ->route('process-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
