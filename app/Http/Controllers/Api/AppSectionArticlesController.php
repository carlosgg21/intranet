<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\AppSection;
use Illuminate\Http\Request;

class AppSectionArticlesController extends Controller
{
    public function index(
        Request $request,
        AppSection $appSection
    ): ArticleCollection {
        $this->authorize('view', $appSection);

        $search = $request->get('search', '');

        $articles = $appSection
            ->articles()
            ->search($search)
            ->latest()
            ->paginate();

        return new ArticleCollection($articles);
    }

    public function store(
        Request $request,
        AppSection $appSection
    ): ArticleResource {
        $this->authorize('create', Article::class);

        $validated = $request->validate([
            'title'      => ['required', 'max:255', 'string'],
            'text'       => ['required', 'max:255', 'string'],
            'position'   => ['required', 'numeric'],
            'created_by' => ['nullable', 'max:255', 'string'],
            'image'      => ['nullable', 'image', 'max:1024'],
            'date'       => ['nullable', 'date'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $article = $appSection->articles()->create($validated);

        return new ArticleResource($article);
    }
}
