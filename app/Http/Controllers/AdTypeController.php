<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdTypeStoreRequest;
use App\Http\Requests\AdTypeUpdateRequest;
use App\Models\AdType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', AdType::class);

        $search = $request->get('search', '');

        $adTypes = AdType::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.ad_types.index', compact('adTypes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', AdType::class);

        return view('app.ad_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdTypeStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', AdType::class);

        $validated = $request->validated();

        $adType = AdType::create($validated);

        return redirect()
            ->route('ad-types.edit', $adType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, AdType $adType): View
    {
        $this->authorize('view', $adType);

        return view('app.ad_types.show', compact('adType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, AdType $adType): View
    {
        $this->authorize('update', $adType);

        return view('app.ad_types.edit', compact('adType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        AdTypeUpdateRequest $request,
        AdType $adType
    ): RedirectResponse {
        $this->authorize('update', $adType);

        $validated = $request->validated();

        $adType->update($validated);

        return redirect()
            ->route('ad-types.edit', $adType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, AdType $adType): RedirectResponse
    {
        $this->authorize('delete', $adType);

        $adType->delete();

        return redirect()
            ->route('ad-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
