@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-settings.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.settings.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.group')</h5>
                    <span>{{ $settings->group ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.name')</h5>
                    <span>{{ $settings->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.display_name')</h5>
                    <span>{{ $settings->display_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.value')</h5>
                    <span>{{ $settings->value ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.type')</h5>
                    <span>{{ $settings->type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.description')</h5>
                    <span>{{ $settings->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-settings.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Settings::class)
                <a
                    href="{{ route('all-settings.create') }}"
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
