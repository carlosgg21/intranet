@php $editing = isset($processType) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Tipo de Proceso"
            :value="old('name', ($editing ? $processType->name : ''))"
            maxlength="255"
            placeholder="Tipo de Proceso"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Descripción"
            maxlength="255"
            >{{ old('description', ($editing ? $processType->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
