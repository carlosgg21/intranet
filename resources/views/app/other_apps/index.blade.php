@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.other_apps.index_title')</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input id="indexSearch" type="text" name="search"
                                    placeholder="{{ __('crud.common.search') }}" value="{{ $search ?? '' }}"
                                    class="form-control" autocomplete="off" />
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\OtherApp::class)
                        <a href="{{ route('other-apps.create') }}" class="btn btn-primary">
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.other_apps.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.other_apps.inputs.type')
                            </th>
                            <th class="text-left">
                                @lang('crud.other_apps.inputs.display_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.other_apps.inputs.url')
                            </th>
                            <th class="text-left">
                                @lang('crud.other_apps.inputs.icon')
                            </th>
                            <th class="text-left">
                                @lang('crud.other_apps.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.other_apps.inputs.description')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($otherApps as $otherApp)
                        <tr>
                            <td>{{ $otherApp->name ?? '-' }}</td>
                            <td>{{ $otherApp->type ?? '-' }}</td>
                            <td>{{ $otherApp->display_name ?? '-' }}</td>
                            <td>
                                <a target="_blank" href="{{ $otherApp->url }}">{{ $otherApp->url ?? '-' }}</a>
                            </td>
                            <td>{{ $otherApp->icon ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $otherApp->image ? \Storage::url($otherApp->image) : '' }}" />
                            </td>
                            <td>{{ $otherApp->description ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div role="group" aria-label="Row Actions" class="btn-group">
                                    @can('update', $otherApp)
                                    <a href="{{ route('other-apps.edit', $otherApp) }}">
                                        <button type="button" class="btn btn-light">
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $otherApp)
                                    <a href="{{ route('other-apps.show', $otherApp) }}">
                                        <button type="button" class="btn btn-light">
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $otherApp)
                                    <form action="{{ route('other-apps.destroy', $otherApp) }}" method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-light text-danger">
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">{!! $otherApps->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection