@php $editing = isset($setting) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="namaSetting"
            label="Nama Setting"
            :value="old('namaSetting', ($editing ? $setting->namaSetting : ''))"
            maxlength="255"
            placeholder="Nama Setting"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="nilaiSebelumKalibrasi"
            label="Nilai Sebelum Kalibrasi"
            :value="old('nilaiSebelumKalibrasi', ($editing ? $setting->nilaiSebelumKalibrasi : ''))"
            max="255"
            placeholder="Nilai Sebelum Kalibrasi"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="displaySebelumKalibrasi"
            label="Display Sebelum Kalibrasi"
            :value="old('displaySebelumKalibrasi', ($editing ? $setting->displaySebelumKalibrasi : ''))"
            max="255"
            placeholder="Display Sebelum Kalibrasi"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="nilaiSetelahKalibrasi"
            label="Nilai Setelah Kalibrasi"
            :value="old('nilaiSetelahKalibrasi', ($editing ? $setting->nilaiSetelahKalibrasi : ''))"
            max="255"
            placeholder="Nilai Setelah Kalibrasi"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="displaySetelahKalibrasi"
            label="Display Setelah Kalibrasi"
            :value="old('displaySetelahKalibrasi', ($editing ? $setting->displaySetelahKalibrasi : ''))"
            max="255"
            placeholder="Display Setelah Kalibrasi"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="peralatan_telemetri_id"
            label="Peralatan Telemetri"
            required
        >
            @php $selected = old('peralatan_telemetri_id', ($editing ? $setting->peralatan_telemetri_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Peralatan Telemetri</option>
            @foreach($peralatanTelemetris as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
