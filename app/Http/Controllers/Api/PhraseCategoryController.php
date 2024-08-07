<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhraseCategoryStoreRequest;
use App\Http\Requests\PhraseCategoryUpdateRequest;
use App\Http\Resources\PhraseCategoryCollection;
use App\Http\Resources\PhraseCategoryResource;
use App\Models\PhraseCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhraseCategoryController extends Controller
{
    public function index(Request $request): PhraseCategoryCollection
    {
        $this->authorize('view-any', PhraseCategory::class);

        $search = $request->get('search', '');

        $phraseCategories = PhraseCategory::search($search)
            ->latest()
            ->paginate();

        return new PhraseCategoryCollection($phraseCategories);
    }

    public function store(
        PhraseCategoryStoreRequest $request
    ): PhraseCategoryResource {
        $this->authorize('create', PhraseCategory::class);

        $validated = $request->validated();

        $phraseCategory = PhraseCategory::create($validated);

        return new PhraseCategoryResource($phraseCategory);
    }

    public function show(
        Request $request,
        PhraseCategory $phraseCategory
    ): PhraseCategoryResource {
        $this->authorize('view', $phraseCategory);

        return new PhraseCategoryResource($phraseCategory);
    }

    public function update(
        PhraseCategoryUpdateRequest $request,
        PhraseCategory $phraseCategory
    ): PhraseCategoryResource {
        $this->authorize('update', $phraseCategory);

        $validated = $request->validated();

        $phraseCategory->update($validated);

        return new PhraseCategoryResource($phraseCategory);
    }

    public function destroy(
        Request $request,
        PhraseCategory $phraseCategory
    ): Response {
        $this->authorize('delete', $phraseCategory);

        $phraseCategory->delete();

        return response()->noContent();
    }
}
