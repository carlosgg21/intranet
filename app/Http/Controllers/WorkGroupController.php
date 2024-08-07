<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkGroupStoreRequest;
use App\Http\Requests\WorkGroupUpdateRequest;
use App\Models\Employee;
use App\Models\WorkGroup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', WorkGroup::class);

        $search = $request->get('search', '');

        $workGroups = WorkGroup::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.work_groups.index', compact('workGroups', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', WorkGroup::class);

        $employees = Employee::get();

        return view('app.work_groups.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkGroupStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', WorkGroup::class);

        $validated = $request->validated();

        $workGroup = WorkGroup::create($validated);

        $workGroup->employees()->attach($request->employees);

        return redirect()
            ->route('work-groups.edit', $workGroup)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, WorkGroup $workGroup): View
    {
        $this->authorize('view', $workGroup);

        return view('app.work_groups.show', compact('workGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, WorkGroup $workGroup): View
    {
        $this->authorize('update', $workGroup);

        $employees = Employee::get();

        return view('app.work_groups.edit', compact('workGroup', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        WorkGroupUpdateRequest $request,
        WorkGroup $workGroup
    ): RedirectResponse {
        $this->authorize('update', $workGroup);

        $validated = $request->validated();
        $workGroup->employees()->sync($request->employees);

        $workGroup->update($validated);

        return redirect()
            ->route('work-groups.edit', $workGroup)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        WorkGroup $workGroup
    ): RedirectResponse {
        $this->authorize('delete', $workGroup);

        $workGroup->delete();

        return redirect()
            ->route('work-groups.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
