@php $editing = isset($otherApp) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Nombre"
            :value="old('name', ($editing ? $otherApp->name : ''))"
            maxlength="255"
            placeholder="Nombre"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="type" label="Tipo">
            @php $selected = old('type', ($editing ? $otherApp->type : '')) @endphp
            <option value="site" {{ $selected == 'site' ? 'selected' : '' }} >Site</option>
            <option value="aplication" {{ $selected == 'aplication' ? 'selected' : '' }} >Aplication</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="display_name"
            label="Mostrar"
            :value="old('display_name', ($editing ? $otherApp->display_name : ''))"
            maxlength="255"
            placeholder="Mostrar"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.url
            name="url"
            label="Url"
            :value="old('url', ($editing ? $otherApp->url : ''))"
            maxlength="255"
            placeholder="Url"
        ></x-inputs.url>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="icon"
            label="Icon"
            :value="old('icon', ($editing ? $otherApp->icon : ''))"
            maxlength="255"
            placeholder="Icon"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $otherApp->image ? \Storage::url($otherApp->image) : '' }}')"
        >
            <x-inputs.partials.label
                name="image"
                label="Imagen"
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
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $otherApp->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
