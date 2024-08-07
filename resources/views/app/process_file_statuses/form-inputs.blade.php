@php $editing = isset($processFileStatus) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Estado del Documento"
            :value="old('name', ($editing ? $processFileStatus->name : ''))"
            maxlength="255"
            placeholder="Estado del Documento"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Descripción"
            maxlength="255"
            >{{ old('description', ($editing ? $processFileStatus->description :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
