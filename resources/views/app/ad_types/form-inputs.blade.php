@php $editing = isset($adType) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Tipo de Anuncio"
            :value="old('name', ($editing ? $adType->name : ''))"
            maxlength="255"
            placeholder="NameTipo de Anuncio"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="icon"
            label="Icono"
            :value="old('icon', ($editing ? $adType->icon : ''))"
            maxlength="255"
            placeholder="Icono"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Descripción"
            maxlength="255"
            >{{ old('description', ($editing ? $adType->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
