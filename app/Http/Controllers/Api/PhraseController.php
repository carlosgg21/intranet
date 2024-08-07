<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhraseStoreRequest;
use App\Http\Requests\PhraseUpdateRequest;
use App\Http\Resources\PhraseCollection;
use App\Http\Resources\PhraseResource;
use App\Models\Phrase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PhraseController extends Controller
{
    public function index(Request $request): PhraseCollection
    {
        $this->authorize('view-any', Phrase::class);

        $search = $request->get('search', '');

        $phrases = Phrase::search($search)
            ->latest()
            ->paginate();

        return new PhraseCollection($phrases);
    }

    public function store(PhraseStoreRequest $request): PhraseResource
    {
        $this->authorize('create', Phrase::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $phrase = Phrase::create($validated);

        return new PhraseResource($phrase);
    }

    public function show(Request $request, Phrase $phrase): PhraseResource
    {
        $this->authorize('view', $phrase);

        return new PhraseResource($phrase);
    }

    public function update(
        PhraseUpdateRequest $request,
        Phrase $phrase
    ): PhraseResource {
        $this->authorize('update', $phrase);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($phrase->image) {
                Storage::delete($phrase->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $phrase->update($validated);

        return new PhraseResource($phrase);
    }

    public function destroy(Request $request, Phrase $phrase): Response
    {
        $this->authorize('delete', $phrase);

        if ($phrase->image) {
            Storage::delete($phrase->image);
        }

        $phrase->delete();

        return response()->noContent();
    }
}
