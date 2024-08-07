<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementStoreRequest;
use App\Http\Requests\AnnouncementUpdateRequest;
use App\Http\Resources\AnnouncementCollection;
use App\Http\Resources\AnnouncementResource;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function index(Request $request): AnnouncementCollection
    {
        $this->authorize('view-any', Announcement::class);

        $search = $request->get('search', '');

        $announcements = Announcement::search($search)
            ->latest()
            ->paginate();

        return new AnnouncementCollection($announcements);
    }

    public function store(
        AnnouncementStoreRequest $request
    ): AnnouncementResource {
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

        return new AnnouncementResource($announcement);
    }

    public function show(
        Request $request,
        Announcement $announcement
    ): AnnouncementResource {
        $this->authorize('view', $announcement);

        return new AnnouncementResource($announcement);
    }

    public function update(
        AnnouncementUpdateRequest $request,
        Announcement $announcement
    ): AnnouncementResource {
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

        return new AnnouncementResource($announcement);
    }

    public function destroy(
        Request $request,
        Announcement $announcement
    ): Response {
        $this->authorize('delete', $announcement);

        if ($announcement->image) {
            Storage::delete($announcement->image);
        }

        if ($announcement->document) {
            Storage::delete($announcement->document);
        }

        $announcement->delete();

        return response()->noContent();
    }
}
