@php $editing = isset($area) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Área"
            :value="old('name', ($editing ? $area->name : ''))"
            maxlength="255"
            placeholder="Área"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Descripción"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $area->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
