<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhraseCategoryStoreRequest;
use App\Http\Requests\PhraseCategoryUpdateRequest;
use App\Models\PhraseCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PhraseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', PhraseCategory::class);

        $search = $request->get('search', '');

        $phraseCategories = PhraseCategory::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.phrase_categories.index',
            compact('phraseCategories', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', PhraseCategory::class);

        return view('app.phrase_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhraseCategoryStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', PhraseCategory::class);

        $validated = $request->validated();

        $phraseCategory = PhraseCategory::create($validated);

        return redirect()
            ->route('phrase-categories.edit', $phraseCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, PhraseCategory $phraseCategory): View
    {
        $this->authorize('view', $phraseCategory);

        return view('app.phrase_categories.show', compact('phraseCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, PhraseCategory $phraseCategory): View
    {
        $this->authorize('update', $phraseCategory);

        return view('app.phrase_categories.edit', compact('phraseCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        PhraseCategoryUpdateRequest $request,
        PhraseCategory $phraseCategory
    ): RedirectResponse {
        $this->authorize('update', $phraseCategory);

        $validated = $request->validated();

        $phraseCategory->update($validated);

        return redirect()
            ->route('phrase-categories.edit', $phraseCategory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        PhraseCategory $phraseCategory
    ): RedirectResponse {
        $this->authorize('delete', $phraseCategory);

        $phraseCategory->delete();

        return redirect()
            ->route('phrase-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
