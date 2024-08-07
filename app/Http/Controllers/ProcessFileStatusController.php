<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessFileStatusStoreRequest;
use App\Http\Requests\ProcessFileStatusUpdateRequest;
use App\Models\ProcessFileStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProcessFileStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ProcessFileStatus::class);

        $search = $request->get('search', '');

        $processFileStatuses = ProcessFileStatus::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.process_file_statuses.index',
            compact('processFileStatuses', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ProcessFileStatus::class);

        return view('app.process_file_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        ProcessFileStatusStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', ProcessFileStatus::class);

        $validated = $request->validated();

        $processFileStatus = ProcessFileStatus::create($validated);

        return redirect()
            ->route('process-file-statuses.edit', $processFileStatus)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        ProcessFileStatus $processFileStatus
    ): View {
        $this->authorize('view', $processFileStatus);

        return view(
            'app.process_file_statuses.show',
            compact('processFileStatus')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        ProcessFileStatus $processFileStatus
    ): View {
        $this->authorize('update', $processFileStatus);

        return view(
            'app.process_file_statuses.edit',
            compact('processFileStatus')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ProcessFileStatusUpdateRequest $request,
        ProcessFileStatus $processFileStatus
    ): RedirectResponse {
        $this->authorize('update', $processFileStatus);

        $validated = $request->validated();

        $processFileStatus->update($validated);

        return redirect()
            ->route('process-file-statuses.edit', $processFileStatus)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ProcessFileStatus $processFileStatus
    ): RedirectResponse {
        $this->authorize('delete', $processFileStatus);

        $processFileStatus->delete();

        return redirect()
            ->route('process-file-statuses.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
