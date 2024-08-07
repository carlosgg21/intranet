<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function index(Request $request): EventCollection
    {
        $this->authorize('view-any', Event::class);

        $search = $request->get('search', '');

        $events = Event::search($search)
            ->latest()
            ->paginate();

        return new EventCollection($events);
    }

    public function store(EventStoreRequest $request): EventResource
    {
        $this->authorize('create', Event::class);

        $validated = $request->validated();
        $validated['participants'] = json_decode(
            $validated['participants'],
            true
        );

        $event = Event::create($validated);

        return new EventResource($event);
    }

    public function show(Request $request, Event $event): EventResource
    {
        $this->authorize('view', $event);

        return new EventResource($event);
    }

    public function update(
        EventUpdateRequest $request,
        Event $event
    ): EventResource {
        $this->authorize('update', $event);

        $validated = $request->validated();

        $validated['participants'] = json_decode(
            $validated['participants'],
            true
        );

        $event->update($validated);

        return new EventResource($event);
    }

    public function destroy(Request $request, Event $event): Response
    {
        $this->authorize('delete', $event);

        $event->delete();

        return response()->noContent();
    }
}
