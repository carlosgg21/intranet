<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppSectionStoreRequest;
use App\Http\Requests\AppSectionUpdateRequest;
use App\Models\AppSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', AppSection::class);

        $search = $request->get('search', '');

        $appSections = AppSection::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.app_sections.index', compact('appSections', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', AppSection::class);

        return view('app.app_sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppSectionStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', AppSection::class);

        $validated = $request->validated();

        $appSection = AppSection::create($validated);

        return redirect()
            ->route('app-sections.edit', $appSection)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, AppSection $appSection): View
    {
        $this->authorize('view', $appSection);

        return view('app.app_sections.show', compact('appSection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, AppSection $appSection): View
    {
        $this->authorize('update', $appSection);

        return view('app.app_sections.edit', compact('appSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        AppSectionUpdateRequest $request,
        AppSection $appSection
    ): RedirectResponse {
        $this->authorize('update', $appSection);

        $validated = $request->validated();

        $appSection->update($validated);

        return redirect()
            ->route('app-sections.edit', $appSection)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        AppSection $appSection
    ): RedirectResponse {
        $this->authorize('delete', $appSection);

        $appSection->delete();

        return redirect()
            ->route('app-sections.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
