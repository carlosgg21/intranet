<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementStoreRequest;
use App\Http\Requests\AnnouncementUpdateRequest;
use App\Models\AdType;
use App\Models\Announcement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Announcement::class);

        $search = $request->get('search', '');

        $announcements = Announcement::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.announcements.index',
            compact('announcements', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Announcement::class);

        $adTypes = AdType::pluck('name', 'id');

        return view('app.announcements.create', compact('adTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnouncementStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Announcement::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        if ($request->hasFile('document')) {
            $validated['document'] = $request
                ->file('document')
                ->store('public');
        }

        $announcement = Announcement::create($validated);

        return redirect()
            ->route('announcements.edit', $announcement)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Announcement $announcement): View
    {
        $this->authorize('view', $announcement);

        return view('app.announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Announcement $announcement): View
    {
        $this->authorize('update', $announcement);

        $adTypes = AdType::pluck('name', 'id');

        return view(
            'app.announcements.edit',
            compact('announcement', 'adTypes')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        AnnouncementUpdateRequest $request,
        Announcement $announcement
    ): RedirectResponse {
        $this->authorize('update', $announcement);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($announcement->image) {
                Storage::delete($announcement->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        if ($request->hasFile('document')) {
            if ($announcement->document) {
                Storage::delete($announcement->document);
            }

            $validated['document'] = $request
                ->file('document')
                ->store('public');
        }

        $announcement->update($validated);

        return redirect()
            ->route('announcements.edit', $announcement)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Announcement $announcement
    ): RedirectResponse {
        $this->authorize('delete', $announcement);

        if ($announcement->image) {
            Storage::delete($announcement->image);
        }

        if ($announcement->document) {
            Storage::delete($announcement->document);
        }

        $announcement->delete();

        return redirect()
            ->route('announcements.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
