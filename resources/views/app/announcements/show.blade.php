@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('announcements.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.announcements.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.announcements.inputs.title')</h5>
                    <span>{{ $announcement->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.announcements.inputs.ad_type_id')</h5>
                    <span
                        >{{ optional($announcement->adType)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.announcements.inputs.text')</h5>
                    <span>{{ $announcement->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.announcements.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $announcement->image ? \Storage::url($announcement->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.announcements.inputs.document')</h5>
                    @if($announcement->document)
                    <a
                        href="{{ \Storage::url($announcement->document) }}"
                        target="blank"
                        ><i class="icon ion-md-download"></i>&nbsp;Download</a
                    >
                    @else - @endif
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.announcements.inputs.created_by')</h5>
                    <span>{{ $announcement->created_by ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('announcements.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Announcement::class)
                <a
                    href="{{ route('announcements.create') }}"
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
