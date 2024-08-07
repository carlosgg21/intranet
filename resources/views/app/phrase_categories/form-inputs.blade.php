@php $editing = isset($phraseCategory) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $phraseCategory->name : ''))"
            maxlength="255"
            placeholder="Categoría"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $phraseCategory->description :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
