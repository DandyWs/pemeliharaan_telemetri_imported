@php $editing = isset($komponen) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nama"
            label="Nama Komponen"
            :value="old('nama', ($editing ? $komponen->nama : ''))"
            maxlength="255"
            placeholder="Nama Komponen"
            required
        ></x-inputs.text>
    </x-inputs.group>

    {{-- <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="indikatorLED"
            label="Indikator Led"
            :checked="old('indikatorLED', ($editing ? $komponen->indikatorLED : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="simCard"
            label="Sim Card"
            :checked="old('simCard', ($editing ? $komponen->simCard : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="kondisiAlat"
            label="Kondisi Alat"
            :checked="old('kondisiAlat', ($editing ? $komponen->kondisiAlat : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="sambunganKabel"
            label="Sambungan Kabel"
            :checked="old('sambunganKabel', ($editing ? $komponen->sambunganKabel : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="perawatanSonde"
            label="Perawatan Sonde"
            :checked="old('perawatanSonde', ($editing ? $komponen->perawatanSonde : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="testDanSettingRTC"
            label="Test Dan Setting Rtc"
            :checked="old('testDanSettingRTC', ($editing ? $komponen->testDanSettingRTC : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="levelAirAki"
            label="Level Air Aki"
            :checked="old('levelAirAki', ($editing ? $komponen->levelAirAki : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="teganganBateraiAki"
            label="Tegangan Baterai Aki"
            :value="old('teganganBateraiAki', ($editing ? $komponen->teganganBateraiAki : ''))"
            maxlength="255"
            placeholder="Tegangan Baterai Aki"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="peralatan_telemetri_id"
            label="Peralatan Telemetri"
            required
        >
            @php $selected = old('peralatan_telemetri_id', ($editing ? $komponen->peralatan_telemetri_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Peralatan Telemetri</option>
            @foreach($peralatanTelemetris as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group> --}}
</div>
