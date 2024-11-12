@php $editing = isset($pemeliharaan) @endphp

<div class="row">
        <x-inputs.group class="col-md-6">
            <x-inputs.datetime
                name="tanggalPemeliharan"
                label="Tanggal Pemeliharan"
                value="{{ old('tanggalPemeliharan', ($editing ? optional($pemeliharaan->tanggalPemeliharan)->format('Y-m-d\TH:i:s') : '')) }}"
                max="255"
                required
            ></x-inputs.datetime>
        </x-inputs.group>

        <x-inputs.group class="col-md-6">
            <x-inputs.datetime
                name="waktuMulaiPemeliharan"
                label="Waktu Mulai Pemeliharan"
                value="{{ old('waktuMulaiPemeliharan', ($editing ? optional($pemeliharaan->waktuMulaiPemeliharan)->format('Y-m-d\TH:i:s') : '')) }}"
                max="255"
                required
            ></x-inputs.datetime>
        </x-inputs.group>

        <x-inputs.group class="col-md-6">
            <x-inputs.text
                name="periodePemeliharaan"
                label="Periode Pemeliharaan"
                :value="old('periodePemeliharaan', ($editing ? $pemeliharaan->periodePemeliharaan : ''))"
                maxlength="255"
                placeholder="Periode Pemeliharaan"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="col-md-6">
            <x-inputs.text
                name="cuaca"
                label="Cuaca"
                :value="old('cuaca', ($editing ? $pemeliharaan->cuaca : ''))"
                maxlength="255"
                placeholder="Cuaca"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="col-md-6">
            <x-inputs.text
                name="no_AlatUkur"
                label="No Alat Ukur"
                :value="old('no_AlatUkur', ($editing ? $pemeliharaan->no_AlatUkur : ''))"
                maxlength="255"
                placeholder="No Alat Ukur"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="col-md-6">
            <x-inputs.text
                name="no_GSM"
                label="No Gsm"
                :value="old('no_GSM', ($editing ? $pemeliharaan->no_GSM : ''))"
                maxlength="255"
                placeholder="No Gsm"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="col-md-6">
            <x-inputs.select name="user_id" label="User" required>
                @php $selected = old('user_id', ($editing ? $pemeliharaan->user_id : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
                @foreach($users as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.select>
        </x-inputs.group>

        <x-inputs.group class="col-md-6">
            <x-inputs.select
                name="peralatan_telemetri_id"
                label="Peralatan Telemetri"
                required
            >
                @php $selected = old('peralatan_telemetri_id', ($editing ? $pemeliharaan->peralatan_telemetri_id : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Peralatan Telemetri</option>
                @foreach($peralatanTelemetris as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.select>
        </x-inputs.group>
        @php $editing = isset($komponen) @endphp
        
        @foreach ($komponen2 as $value)
    <div class="col-md-6">
        <x-inputs.group>
            <label for="namaKomponen">{{$value}}</label>
            <span>{{ old('namaKomponen', ($editing ? $komponen->namaKomponen : '')) }}</span>
        </x-inputs.group>
        @foreach ($detailKomponen as $detailsKomponen)
        <x-inputs.group>
            <x-inputs.checkbox
                name="simCard"
                label="{{ $detailsKomponen->namadetail }}"
                :checked="old('simCard', ($editing ? $detailKomponen->namadetail : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>
        @endforeach
        
    </div>
    @endforeach

</div>
