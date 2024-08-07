@php $editing = isset($phrase) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="phrase_category_id" label="Categoría">
            @php $selected = old('phrase_category_id', ($editing ? $phrase->phrase_category_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Seleccione una opción</option>
            @foreach($phraseCategories as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="text" label="Frase" maxlength="255" required
            >{{ old('text', ($editing ? $phrase->text : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="author"
            label="Autor"
            :value="old('author', ($editing ? $phrase->author : ''))"
            maxlength="255"
            placeholder="Autor"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $phrase->image ? \Storage::url($phrase->image) : '' }}')"
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
</div>
