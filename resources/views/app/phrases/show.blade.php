@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('phrases.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.phrases.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.phrases.inputs.phrase_category_id')</h5>
                    <span
                        >{{ optional($phrase->phraseCategory)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.phrases.inputs.text')</h5>
                    <span>{{ $phrase->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.phrases.inputs.author')</h5>
                    <span>{{ $phrase->author ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.phrases.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $phrase->image ? \Storage::url($phrase->image) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('phrases.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Phrase::class)
                <a href="{{ route('phrases.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
