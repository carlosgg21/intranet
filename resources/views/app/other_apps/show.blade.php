@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('other-apps.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.other_apps.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.other_apps.inputs.name')</h5>
                    <span>{{ $otherApp->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.other_apps.inputs.type')</h5>
                    <span>{{ $otherApp->type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.other_apps.inputs.display_name')</h5>
                    <span>{{ $otherApp->display_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.other_apps.inputs.url')</h5>
                    <a target="_blank" href="{{ $otherApp->url }}"
                        >{{ $otherApp->url ?? '-' }}</a
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.other_apps.inputs.icon')</h5>
                    <span>{{ $otherApp->icon ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.other_apps.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $otherApp->image ? \Storage::url($otherApp->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.other_apps.inputs.description')</h5>
                    <span>{{ $otherApp->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('other-apps.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\OtherApp::class)
                <a
                    href="{{ route('other-apps.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
