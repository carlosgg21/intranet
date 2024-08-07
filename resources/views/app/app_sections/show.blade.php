@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('app-sections.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.app_sections.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.app_sections.inputs.name')</h5>
                    <span>{{ $appSection->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.app_sections.inputs.display_name')</h5>
                    <span>{{ $appSection->display_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.app_sections.inputs.description')</h5>
                    <span>{{ $appSection->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('app-sections.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\AppSection::class)
                <a
                    href="{{ route('app-sections.create') }}"
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
