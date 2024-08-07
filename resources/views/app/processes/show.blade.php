@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('processes.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.processes.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.processes.inputs.code')</h5>
                    <span>{{ $process->code ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.processes.inputs.name')</h5>
                    <span>{{ $process->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.processes.inputs.description')</h5>
                    <span>{{ $process->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.processes.inputs.process_type_id')</h5>
                    <span
                        >{{ optional($process->processType)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.processes.inputs.parent_id')</h5>
                    <span>{{ $process->parent_id ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('processes.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Process::class)
                <a href="{{ route('processes.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    @can('view-any', App\Models\ProcessFile::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Process Files</h4>

            <livewire:process-process-files-detail :process="$process" />
        </div>
    </div>
    @endcan
</div>
@endsection
