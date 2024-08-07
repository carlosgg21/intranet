@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.employees.index_title')</h4>
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
                        @can('create', App\Models\Employee::class)
                        <a
                            href="{{ route('employees.create') }}"
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
                                @lang('crud.employees.inputs.identification')
                            </th>
                            <th class="text-left">
                                @lang('crud.employees.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.employees.inputs.last_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.employees.inputs.charge_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.employees.inputs.area_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.employees.inputs.birthday')
                            </th>
                            <th class="text-left">
                                @lang('crud.employees.inputs.phone')
                            </th>
                            <th class="text-left">
                                @lang('crud.employees.inputs.cell_phone')
                            </th>
                            <th class="text-left">
                                @lang('crud.employees.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.employees.inputs.hiring_date')
                            </th>
                            <th class="text-left">
                                @lang('crud.employees.inputs.observation')
                            </th>
                            <th class="text-left">
                                @lang('crud.employees.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.employees.inputs.code')
                            </th>
                            <th class="text-left">
                                @lang('crud.employees.inputs.company_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employees as $employee)
                        <tr>
                            <td>{{ $employee->identification ?? '-' }}</td>
                            <td>{{ $employee->name ?? '-' }}</td>
                            <td>{{ $employee->last_name ?? '-' }}</td>
                            <td>
                                {{ optional($employee->charge)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($employee->area)->name ?? '-' }}
                            </td>
                            <td>{{ $employee->birthday ?? '-' }}</td>
                            <td>{{ $employee->phone ?? '-' }}</td>
                            <td>{{ $employee->cell_phone ?? '-' }}</td>
                            <td>{{ $employee->email ?? '-' }}</td>
                            <td>{{ $employee->hiring_date ?? '-' }}</td>
                            <td>{{ $employee->observation ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $employee->image ? \Storage::url($employee->image) : '' }}"
                                />
                            </td>
                            <td>{{ $employee->code ?? '-' }}</td>
                            <td>
                                {{ optional($employee->company)->name ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $employee)
                                    <a
                                        href="{{ route('employees.edit', $employee) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $employee)
                                    <a
                                        href="{{ route('employees.show', $employee) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $employee)
                                    <form
                                        action="{{ route('employees.destroy', $employee) }}"
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
                            <td colspan="15">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="15">{!! $employees->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
