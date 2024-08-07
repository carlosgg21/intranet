<?php

namespace App\Http\Controllers;

use App\Http\Requests\OtherAppStoreRequest;
use App\Http\Requests\OtherAppUpdateRequest;
use App\Models\OtherApp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class OtherAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', OtherApp::class);

        $search = $request->get('search', '');

        $otherApps = OtherApp::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.other_apps.index', compact('otherApps', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', OtherApp::class);

        return view('app.other_apps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OtherAppStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', OtherApp::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $otherApp = OtherApp::create($validated);

        return redirect()
            ->route('other-apps.edit', $otherApp)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, OtherApp $otherApp): View
    {
        $this->authorize('view', $otherApp);

        return view('app.other_apps.show', compact('otherApp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, OtherApp $otherApp): View
    {
        $this->authorize('update', $otherApp);

        return view('app.other_apps.edit', compact('otherApp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        OtherAppUpdateRequest $request,
        OtherApp $otherApp
    ): RedirectResponse {
        $this->authorize('update', $otherApp);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($otherApp->image) {
                Storage::delete($otherApp->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $otherApp->update($validated);

        return redirect()
            ->route('other-apps.edit', $otherApp)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        OtherApp $otherApp
    ): RedirectResponse {
        $this->authorize('delete', $otherApp);

        if ($otherApp->image) {
            Storage::delete($otherApp->image);
        }

        $otherApp->delete();

        return redirect()
            ->route('other-apps.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
