@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('articles.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.articles.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.articles.inputs.title')</h5>
                    <span>{{ $article->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.articles.inputs.text')</h5>
                    <span>{{ $article->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.articles.inputs.position')</h5>
                    <span>{{ $article->position ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.articles.inputs.created_by')</h5>
                    <span>{{ $article->created_by ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.articles.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $article->image ? \Storage::url($article->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.articles.inputs.date')</h5>
                    <span>{{ $article->date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.articles.inputs.app_section_id')</h5>
                    <span
                        >{{ optional($article->appSection)->name ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('articles.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Article::class)
                <a href="{{ route('articles.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
