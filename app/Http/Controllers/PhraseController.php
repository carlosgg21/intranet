<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhraseStoreRequest;
use App\Http\Requests\PhraseUpdateRequest;
use App\Models\Phrase;
use App\Models\PhraseCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PhraseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Phrase::class);

        $search = $request->get('search', '');

        $phrases = Phrase::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.phrases.index', compact('phrases', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Phrase::class);

        $phraseCategories = PhraseCategory::pluck('name', 'id');

        return view('app.phrases.create', compact('phraseCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhraseStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Phrase::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $phrase = Phrase::create($validated);

        return redirect()
            ->route('phrases.edit', $phrase)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Phrase $phrase): View
    {
        $this->authorize('view', $phrase);

        return view('app.phrases.show', compact('phrase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Phrase $phrase): View
    {
        $this->authorize('update', $phrase);

        $phraseCategories = PhraseCategory::pluck('name', 'id');

        return view('app.phrases.edit', compact('phrase', 'phraseCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        PhraseUpdateRequest $request,
        Phrase $phrase
    ): RedirectResponse {
        $this->authorize('update', $phrase);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($phrase->image) {
                Storage::delete($phrase->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $phrase->update($validated);

        return redirect()
            ->route('phrases.edit', $phrase)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Phrase $phrase): RedirectResponse
    {
        $this->authorize('delete', $phrase);

        if ($phrase->image) {
            Storage::delete($phrase->image);
        }

        $phrase->delete();

        return redirect()
            ->route('phrases.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
