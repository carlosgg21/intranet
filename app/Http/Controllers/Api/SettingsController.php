<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsStoreRequest;
use App\Http\Requests\SettingsUpdateRequest;
use App\Http\Resources\SettingsCollection;
use App\Http\Resources\SettingsResource;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingsController extends Controller
{
    public function index(Request $request): SettingsCollection
    {
        $this->authorize('view-any', Settings::class);

        $search = $request->get('search', '');

        $allSettings = Settings::search($search)
            ->latest()
            ->paginate();

        return new SettingsCollection($allSettings);
    }

    public function store(SettingsStoreRequest $request): SettingsResource
    {
        $this->authorize('create', Settings::class);

        $validated = $request->validated();

        $settings = Settings::create($validated);

        return new SettingsResource($settings);
    }

    public function show(Request $request, Settings $settings): SettingsResource
    {
        $this->authorize('view', $settings);

        return new SettingsResource($settings);
    }

    public function update(
        SettingsUpdateRequest $request,
        Settings $settings
    ): SettingsResource {
        $this->authorize('update', $settings);

        $validated = $request->validated();

        $settings->update($validated);

        return new SettingsResource($settings);
    }

    public function destroy(Request $request, Settings $settings): Response
    {
        $this->authorize('delete', $settings);

        $settings->delete();

        return response()->noContent();
    }
}
