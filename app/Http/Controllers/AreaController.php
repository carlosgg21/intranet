<?php

namespace App\Http\Controllers;

use App\Http\Requests\AreaStoreRequest;
use App\Http\Requests\AreaUpdateRequest;
use App\Models\Area;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Area::class);

        $search = $request->get('search', '');

        $areas = Area::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.areas.index', compact('areas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Area::class);

        return view('app.areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AreaStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Area::class);

        $validated = $request->validated();

        $area = Area::create($validated);

        return redirect()
            ->route('areas.edit', $area)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Area $area): View
    {
        $this->authorize('view', $area);

        return view('app.areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Area $area): View
    {
        $this->authorize('update', $area);

        return view('app.areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        AreaUpdateRequest $request,
        Area $area
    ): RedirectResponse {
        $this->authorize('update', $area);

        $validated = $request->validated();

        $area->update($validated);

        return redirect()
            ->route('areas.edit', $area)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Area $area): RedirectResponse
    {
        $this->authorize('delete', $area);

        $area->delete();

        return redirect()
            ->route('areas.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
