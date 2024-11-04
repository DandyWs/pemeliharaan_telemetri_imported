@php $editing = isset($peralatanTelemetri) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="namaAlat"
            label="Nama Alat"
            :value="old('namaAlat', ($editing ? $peralatanTelemetri->namaAlat : ''))"
            maxlength="255"
            placeholder="Nama Alat"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="serialNumber"
            label="Serial Number"
            :value="old('serialNumber', ($editing ? $peralatanTelemetri->serialNumber : ''))"
            maxlength="255"
            placeholder="Serial Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="lokasiStasiun"
            label="Lokasi Stasiun"
            :value="old('lokasiStasiun', ($editing ? $peralatanTelemetri->lokasiStasiun : ''))"
            maxlength="255"
            placeholder="Lokasi Stasiun"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="jenis_peralatan_id"
            label="Jenis Peralatan"
            required
        >
            @php $selected = old('jenis_peralatan_id', ($editing ? $peralatanTelemetri->jenis_peralatan_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Jenis Peralatan</option>
            @foreach($jenisPeralatans as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
