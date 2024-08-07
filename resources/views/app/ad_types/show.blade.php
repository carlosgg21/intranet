@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('ad-types.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.ad_types.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.ad_types.inputs.name')</h5>
                    <span>{{ $adType->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.ad_types.inputs.icon')</h5>
                    <span>{{ $adType->icon ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.ad_types.inputs.description')</h5>
                    <span>{{ $adType->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('ad-types.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\AdType::class)
                <a href="{{ route('ad-types.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
