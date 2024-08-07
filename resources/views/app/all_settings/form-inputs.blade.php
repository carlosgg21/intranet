@php $editing = isset($settings) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="group"
            label="Group"
            :value="old('group', ($editing ? $settings->group : ''))"
            maxlength="255"
            placeholder="Group"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $settings->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="display_name"
            label="Display Name"
            :value="old('display_name', ($editing ? $settings->display_name : ''))"
            maxlength="255"
            placeholder="Display Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="value" label="Value" maxlength="255" required
            >{{ old('value', ($editing ? $settings->value : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="type"
            label="Type"
            :value="old('type', ($editing ? $settings->type : ''))"
            maxlength="255"
            placeholder="Type"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $settings->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
