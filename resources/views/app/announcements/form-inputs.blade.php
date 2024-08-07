@php $editing = isset($announcement) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="Título"
            :value="old('title', ($editing ? $announcement->title : ''))"
            maxlength="255"
            placeholder="Título"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="ad_type_id" label="Tipo de Anuncio" required>
            @php $selected = old('ad_type_id', ($editing ? $announcement->ad_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Seleccione una opción</option>
            @foreach($adTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="text" label="Texto" maxlength="255" required
            >{{ old('text', ($editing ? $announcement->text : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $announcement->image ? \Storage::url($announcement->image) : '' }}')"
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
        <x-inputs.partials.label
            name="document"
            label="Document"
        ></x-inputs.partials.label
        ><br />

        <input
            type="file"
            name="document"
            id="document"
            class="form-control-file"
        />

        @if($editing && $announcement->document)
        <div class="mt-2">
            <a
                href="{{ \Storage::url($announcement->document) }}"
                target="_blank"
                ><i class="icon ion-md-download"></i>&nbsp;Download</a
            >
        </div>
        @endif @error('document') @include('components.inputs.partials.error')
        @enderror
    </x-inputs.group>

    <x-inputs.hidden
        name="created_by"
        :value="old('created_by', ($editing ? $announcement->created_by : ''))"
    ></x-inputs.hidden>
</div>
