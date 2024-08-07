<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsStoreRequest;
use App\Http\Requests\SettingsUpdateRequest;
use App\Models\Settings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Settings::class);

        $search = $request->get('search', '');

        $allSettings = Settings::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.all_settings.index', compact('allSettings', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Settings::class);

        return view('app.all_settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingsStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Settings::class);

        $validated = $request->validated();

        $settings = Settings::create($validated);

        return redirect()
            ->route('all-settings.edit', $settings)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Settings $settings): View
    {
        $this->authorize('view', $settings);

        return view('app.all_settings.show', compact('settings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Settings $settings): View
    {
        $this->authorize('update', $settings);

        return view('app.all_settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SettingsUpdateRequest $request,
        Settings $settings
    ): RedirectResponse {
        $this->authorize('update', $settings);

        $validated = $request->validated();

        $settings->update($validated);

        return redirect()
            ->route('all-settings.edit', $settings)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Settings $settings
    ): RedirectResponse {
        $this->authorize('delete', $settings);

        $settings->delete();

        return redirect()
            ->route('all-settings.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
