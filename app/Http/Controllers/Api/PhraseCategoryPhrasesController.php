<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PhraseCollection;
use App\Http\Resources\PhraseResource;
use App\Models\PhraseCategory;
use Illuminate\Http\Request;

class PhraseCategoryPhrasesController extends Controller
{
    public function index(
        Request $request,
        PhraseCategory $phraseCategory
    ): PhraseCollection {
        $this->authorize('view', $phraseCategory);

        $search = $request->get('search', '');

        $phrases = $phraseCategory
            ->phrases()
            ->search($search)
            ->latest()
            ->paginate();

        return new PhraseCollection($phrases);
    }

    public function store(
        Request $request,
        PhraseCategory $phraseCategory
    ): PhraseResource {
        $this->authorize('create', Phrase::class);

        $validated = $request->validate([
            'text'   => ['required', 'max:255', 'string'],
            'author' => ['nullable', 'max:255', 'string'],
            'image'  => ['nullable', 'image', 'max:1024'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $phrase = $phraseCategory->phrases()->create($validated);

        return new PhraseResource($phrase);
    }
}
