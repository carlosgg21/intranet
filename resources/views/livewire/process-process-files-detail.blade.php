<div>
    <div class="mb-4">
        @can('create', App\Models\ProcessFile::class)
        <button class="btn btn-primary" wire:click="newProcessFile">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\ProcessFile::class)
        <button
            class="btn btn-danger"
             {{ empty($selected) ? 'disabled' : '' }} 
            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            wire:click="destroySelected"
        >
            <i class="icon ion-md-trash"></i>
            @lang('crud.common.delete_selected')
        </button>
        @endcan
    </div>

    <x-modal id="process-process-files-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="processFile.code"
                            label="Código"
                            wire:model="processFile.code"
                            maxlength="255"
                            placeholder="Código"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="processFile.title"
                            label="Título"
                            wire:model="processFile.title"
                            maxlength="255"
                            placeholder="Título"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="processFile.description"
                            label="Descripción"
                            wire:model="processFile.description"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.date
                            name="processFileCreatedDate"
                            label="Fecha de Creación"
                            wire:model="processFileCreatedDate"
                            max="255"
                        ></x-inputs.date>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="processFile.created_by"
                            label="Creado por"
                            wire:model="processFile.created_by"
                            maxlength="255"
                            placeholder="Creado por"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="processFile.reviewed_by"
                            label="Revisado por"
                            wire:model="processFile.reviewed_by"
                            maxlength="255"
                            placeholder="Revisado por"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="processFile.appoved_by"
                            label="Aprobado por "
                            wire:model="processFile.appoved_by"
                            maxlength="255"
                            placeholder="Aprobado por "
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.date
                            name="processFileApprovalDate"
                            label="Fecha de Aprovación"
                            wire:model="processFileApprovalDate"
                            max="255"
                        ></x-inputs.date>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.select
                            name="processFile.process_file_status_id"
                            label="Estado"
                            wire:model="processFile.process_file_status_id"
                        >
                            <option value="null" disabled>Seleccione una opción</option>
                            @foreach($processFileStatusesForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.partials.label
                            name="processFileFile"
                            label="File"
                        ></x-inputs.partials.label
                        ><br />

                        <input
                            type="file"
                            name="processFileFile"
                            id="processFileFile{{ $uploadIteration }}"
                            wire:model="processFileFile"
                            class="form-control-file"
                        />

                        @if($editing && $processFile->file)
                        <div class="mt-2">
                            <a
                                href="{{ \Storage::url($processFile->file) }}"
                                target="_blank"
                                ><i class="icon ion-md-download"></i
                                >&nbsp;Download</a
                            >
                        </div>
                        @endif @error('processFileFile')
                        @include('components.inputs.partials.error') @enderror
                    </x-inputs.group>
                </div>
            </div>

            @if($editing) @endif

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th>
                        <input
                            type="checkbox"
                            wire:model="allSelected"
                            wire:click="toggleFullSelection"
                            title="{{ trans('crud.common.select_all') }}"
                        />
                    </th>
                    <th class="text-left">
                        @lang('crud.process_process_files.inputs.code')
                    </th>
                    <th class="text-left">
                        @lang('crud.process_process_files.inputs.title')
                    </th>
                    <th class="text-left">
                        @lang('crud.process_process_files.inputs.description')
                    </th>
                    <th class="text-left">
                        @lang('crud.process_process_files.inputs.created_date')
                    </th>
                    <th class="text-left">
                        @lang('crud.process_process_files.inputs.created_by')
                    </th>
                    <th class="text-left">
                        @lang('crud.process_process_files.inputs.reviewed_by')
                    </th>
                    <th class="text-left">
                        @lang('crud.process_process_files.inputs.appoved_by')
                    </th>
                    <th class="text-left">
                        @lang('crud.process_process_files.inputs.approval_date')
                    </th>
                    <th class="text-left">
                        @lang('crud.process_process_files.inputs.process_file_status_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.process_process_files.inputs.file')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($processFiles as $processFile)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $processFile->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $processFile->code ?? '-' }}</td>
                    <td class="text-left">{{ $processFile->title ?? '-' }}</td>
                    <td class="text-left">
                        {{ $processFile->description ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $processFile->created_date ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $processFile->created_by ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $processFile->reviewed_by ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $processFile->appoved_by ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $processFile->approval_date ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ optional($processFile->processFileStatus)->name ??
                        '-' }}
                    </td>
                    <td class="text-left">
                        @if($processFile->file)
                        <a
                            href="{{ \Storage::url($processFile->file) }}"
                            target="blank"
                            ><i class="icon ion-md-download"></i
                            >&nbsp;Download</a
                        >
                        @else - @endif
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $processFile)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editProcessFile({{ $processFile->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="11">{{ $processFiles->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
