<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnnouncementCollection;
use App\Http\Resources\AnnouncementResource;
use App\Models\AdType;
use Illuminate\Http\Request;

class AdTypeAnnouncementsController extends Controller
{
    public function index(
        Request $request,
        AdType $adType
    ): AnnouncementCollection {
        $this->authorize('view', $adType);

        $search = $request->get('search', '');

        $announcements = $adType
            ->announcements()
            ->search($search)
            ->latest()
            ->paginate();

        return new AnnouncementCollection($announcements);
    }

    public function store(
        Request $request,
        AdType $adType
    ): AnnouncementResource {
        $this->authorize('create', Announcement::class);

        $validated = $request->validate([
            'title'      => ['required', 'max:255', 'string'],
            'text'       => ['required', 'max:255', 'string'],
            'image'      => ['nullable', 'image', 'max:1024'],
            'document'   => ['file', 'max:1024', 'nullable'],
            'created_by' => ['nullable', 'max:255', 'string'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        if ($request->hasFile('document')) {
            $validated['document'] = $request
                ->file('document')
                ->store('public');
        }

        $announcement = $adType->announcements()->create($validated);

        return new AnnouncementResource($announcement);
    }
}
