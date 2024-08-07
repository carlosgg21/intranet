@php $editing = isset($workGroup) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Nombre"
            :value="old('name', ($editing ? $workGroup->name : ''))"
            maxlength="255"
            placeholder="Nombre"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Descripción"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $workGroup->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.employees.name')</h4>

        @foreach ($employees as $employee)
        <div>
            <x-inputs.checkbox
                id="employee{{ $employee->id }}"
                name="employees[]"
                label="{{ ucfirst($employee->name) }}"
                value="{{ $employee->id }}"
                :checked="isset($workGroup) ? $workGroup->employees()->where('id', $employee->id)->exists() : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
</div>
