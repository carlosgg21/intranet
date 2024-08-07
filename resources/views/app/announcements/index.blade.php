@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.announcements.index_title')
                </h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\Announcement::class)
                        <a
                            href="{{ route('announcements.create') }}"
                            class="btn btn-primary"
                        >
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
                                @lang('crud.announcements.inputs.title')
                            </th>
                            <th class="text-left">
                                @lang('crud.announcements.inputs.ad_type_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.announcements.inputs.text')
                            </th>
                            <th class="text-left">
                                @lang('crud.announcements.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.announcements.inputs.document')
                            </th>
                            <th class="text-left">
                                @lang('crud.announcements.inputs.created_by')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($announcements as $announcement)
                        <tr>
                            <td>{{ $announcement->title ?? '-' }}</td>
                            <td>
                                {{ optional($announcement->adType)->name ?? '-'
                                }}
                            </td>
                            <td>{{ $announcement->text ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $announcement->image ? \Storage::url($announcement->image) : '' }}"
                                />
                            </td>
                            <td>
                                @if($announcement->document)
                                <a
                                    href="{{ \Storage::url($announcement->document) }}"
                                    target="blank"
                                    ><i class="icon ion-md-download"></i
                                    >&nbsp;Download</a
                                >
                                @else - @endif
                            </td>
                            <td>{{ $announcement->created_by ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $announcement)
                                    <a
                                        href="{{ route('announcements.edit', $announcement) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $announcement)
                                    <a
                                        href="{{ route('announcements.show', $announcement) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $announcement)
                                    <form
                                        action="{{ route('announcements.destroy', $announcement) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                {!! $announcements->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
