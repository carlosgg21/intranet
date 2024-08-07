@php $editing = isset($currency) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-9">
        <x-inputs.text
            name="name"
            label="Denominación"
            :value="old('name', ($editing ? $currency->name : ''))"
            maxlength="255"
            placeholder="Denominación"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-3">
        <x-inputs.text
            name="acronym"
            label="Siglas"
            :value="old('acronym', ($editing ? $currency->acronym : ''))"
            maxlength="255"
            placeholder="Siglas"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="sign"
            label="Símbolo"
            :value="old('sign', ($editing ? $currency->sign : ''))"
            maxlength="255"
            placeholder="Símbolo"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="code"
            label="Code"
            :value="old('code', ($editing ? $currency->code : ''))"
            maxlength="255"
            placeholder="Code"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="flag"
            label="Flag"
            :value="old('flag', ($editing ? $currency->flag : ''))"
            maxlength="255"
            placeholder="Flag"
        ></x-inputs.text>
    </x-inputs.group>
</div>
