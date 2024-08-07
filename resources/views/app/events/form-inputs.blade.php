@php $editing = isset($event) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Evento"
            :value="old('name', ($editing ? $event->name : ''))"
            maxlength="255"
            placeholder="Evento"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.date
            name="date"
            label="Fecha"
            value="{{ old('date', ($editing ? optional($event->date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="hour"
            label="Hora"
            :value="old('hour', ($editing ? $event->hour : ''))"
            maxlength="255"
            placeholder="Hora"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="place"
            label="Lugar"
            :value="old('place', ($editing ? $event->place : ''))"
            maxlength="255"
            placeholder="Lugar"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $event->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="all_day"
            label="Todo el día"
            :checked="old('all_day', ($editing ? $event->all_day : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="repeat" label="Repetir">
            @php $selected = old('repeat', ($editing ? $event->repeat : 'Evento de una sola vez')) @endphp
            <option value="Evento de una sola vez" {{ $selected == 'Evento de una sola vez' ? 'selected' : '' }} >Evento de una sola vez</option>
            <option value="Diariamente" {{ $selected == 'Diariamente' ? 'selected' : '' }} >Diariamente</option>
            <option value="Semanalmente (mismo dia próxima semana)" {{ $selected == 'Semanalmente (mismo dia próxima semana)' ? 'selected' : '' }} >Semanalmente mismo dia pr xima semana</option>
            <option value="Mensualmente (misma fecha)" {{ $selected == 'Mensualmente (misma fecha)' ? 'selected' : '' }} >Mensualmente misma fecha</option>
            <option value="Anualmente " {{ $selected == 'Anualmente ' ? 'selected' : '' }} >Anualmente</option>
        </x-inputs.select>
    </x-inputs.group>

    @if($editing)
    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="participants"
            label="Participants"
            maxlength="255"
            >{{ old('participants', ($editing ?
            json_encode($event->participants) : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
    @endif

    <x-inputs.hidden
        name="created_by"
        :value="old('created_by', ($editing ? $event->created_by : ''))"
    ></x-inputs.hidden>
</div>
