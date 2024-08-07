@php $editing = isset($charge) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Cargo"
            :value="old('name', ($editing ? $charge->name : ''))"
            maxlength="255"
            placeholder="Cargo"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Descripción"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $charge->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
