@php $editing = isset($employee) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="identification"
            label="Identificación"
            :value="old('identification', ($editing ? $employee->identification : ''))"
            maxlength="255"
            placeholder="Identificación"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Nombre"
            :value="old('name', ($editing ? $employee->name : ''))"
            maxlength="255"
            placeholder="Nombre"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="last_name"
            label="Apellidos"
            :value="old('last_name', ($editing ? $employee->last_name : ''))"
            maxlength="255"
            placeholder="Apellidos"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="charge_id" label="Cargo">
            @php $selected = old('charge_id', ($editing ? $employee->charge_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Seleccione una opción</option>
            @foreach($charges as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="area_id" label="Área">
            @php $selected = old('area_id', ($editing ? $employee->area_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Seleccione una opción</option>
            @foreach($areas as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="birthday"
            label="Birthday"
            value="{{ old('birthday', ($editing ? optional($employee->birthday)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="phone"
            label="Télefono"
            :value="old('phone', ($editing ? $employee->phone : ''))"
            maxlength="255"
            placeholder="Télefono"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="cell_phone"
            label="Móvil"
            :value="old('cell_phone', ($editing ? $employee->cell_phone : ''))"
            maxlength="255"
            placeholder="Móvil"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Correo electrónico"
            :value="old('email', ($editing ? $employee->email : ''))"
            maxlength="255"
            placeholder="Correo electrónico"
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="hiring_date"
            label="Fecha de contratación"
            value="{{ old('hiring_date', ($editing ? optional($employee->hiring_date)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    @if($editing)
    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="discharge_date"
            label="Fecha de Baja"
            value="{{ old('discharge_date', ($editing ? optional($employee->discharge_date)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>
    @endif

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="observation"
            label="Observation"
            maxlength="255"
            >{{ old('observation', ($editing ? $employee->observation : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $employee->image ? \Storage::url($employee->image) : '' }}')"
        >
            <x-inputs.partials.label
                name="image"
                label="Image"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="image"
                    id="image"
                    @change="fileChosen"
                />
            </div>

            @error('image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="code"
            label="Code"
            :value="old('code', ($editing ? $employee->code : ''))"
            maxlength="255"
            placeholder="Code"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="company_id" label="Company" required>
            @php $selected = old('company_id', ($editing ? $employee->company_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Company</option>
            @foreach($companies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
