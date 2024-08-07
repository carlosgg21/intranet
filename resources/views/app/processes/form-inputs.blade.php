@php $editing = isset($process) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="code"
            label="Código"
            :value="old('code', ($editing ? $process->code : ''))"
            maxlength="255"
            placeholder="Código"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Denominación"
            :value="old('name', ($editing ? $process->name : ''))"
            maxlength="255"
            placeholder="Denominación"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $process->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="process_type_id"
            label="Tipo de Proceso"
            required
        >
            @php $selected = old('process_type_id', ($editing ? $process->process_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Seleccione una opción</option>
            @foreach($processTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="parent_id"
            label="Proceso Padre"
            :value="old('parent_id', ($editing ? $process->parent_id : ''))"
            maxlength="255"
            placeholder="Proceso Padre"
        ></x-inputs.text>
    </x-inputs.group>

    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.areas.name')</h4>

        @foreach ($areas as $area)
        <div>
            <x-inputs.checkbox
                id="area{{ $area->id }}"
                name="areas[]"
                label="{{ ucfirst($area->name) }}"
                value="{{ $area->id }}"
                :checked="isset($process) ? $process->areas()->where('id', $area->id)->exists() : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
</div>
