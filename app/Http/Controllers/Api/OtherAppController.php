<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherAppStoreRequest;
use App\Http\Requests\OtherAppUpdateRequest;
use App\Http\Resources\OtherAppCollection;
use App\Http\Resources\OtherAppResource;
use App\Models\OtherApp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class OtherAppController extends Controller
{
    public function index(Request $request): OtherAppCollection
    {
        $this->authorize('view-any', OtherApp::class);

        $search = $request->get('search', '');

        $otherApps = OtherApp::search($search)
            ->latest()
            ->paginate();

        return new OtherAppCollection($otherApps);
    }

    public function store(OtherAppStoreRequest $request): OtherAppResource
    {
        $this->authorize('create', OtherApp::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $otherApp = OtherApp::create($validated);

        return new OtherAppResource($otherApp);
    }

    public function show(Request $request, OtherApp $otherApp): OtherAppResource
    {
        $this->authorize('view', $otherApp);

        return new OtherAppResource($otherApp);
    }

    public function update(
        OtherAppUpdateRequest $request,
        OtherApp $otherApp
    ): OtherAppResource {
        $this->authorize('update', $otherApp);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($otherApp->image) {
                Storage::delete($otherApp->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $otherApp->update($validated);

        return new OtherAppResource($otherApp);
    }

    public function destroy(Request $request, OtherApp $otherApp): Response
    {
        $this->authorize('delete', $otherApp);

        if ($otherApp->image) {
            Storage::delete($otherApp->image);
        }

        $otherApp->delete();

        return response()->noContent();
    }
}
