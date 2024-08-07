@php $editing = isset($appSection) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $appSection->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="display_name"
            label="Display Name"
            :value="old('display_name', ($editing ? $appSection->display_name : ''))"
            maxlength="255"
            placeholder="Display Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $appSection->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
