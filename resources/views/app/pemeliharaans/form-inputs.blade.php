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
        @isset($komponen2)
    @foreach ($komponen2 as $value)
    <div class="col-md-6">
        <x-inputs.group>
            <x-inputs.text
                name="namaKomponen"
                label="{{$value}}"
                :value="old('namaKomponen', ($editing ? $komponen->namaKomponen : ''))"
                maxlength="255"
                placeholder="Nama Komponen"
                required
            ></x-inputs.text>
        </x-inputs.group>
        @for ($j = 0; $j < 2; $j++)
            <x-inputs.group>
            <x-inputs.checkbox
                name="indikatorLED"
                label="{{ $detailsKomponen->namadetail}}"
                :checked="old('indikatorLED', ($editing ? $detailKomponen->namaDetail : ''))"
            ></x-inputs.checkbox>
            </x-inputs.group>
        @endfor

        </div>
        @endfor
        {{-- <x-inputs.group>
            <x-inputs.text
                name="namaKomponen"
                label="Nama Komponen"
                :value="old('namaKomponen', ($editing ? $komponen->namaKomponen : ''))"
                maxlength="255"
                placeholder="Nama Komponen"
                required
            ></x-inputs.text>
        </x-inputs.group> --}}

        {{-- <x-inputs.group>
            <x-inputs.checkbox
                name="indikatorLED"
                label="Indikator LED"
                :checked="old('indikatorLED', ($editing ? $komponen->indikatorLED : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="detailKomponen"
                label="{{ $detailsKomponen->namadetail->where('komponen2_id', $komponen2->id) }}"
                :checked="old('detailKomponen', ($editing ? $detailkomponen->namadetail : ''))"
            ></x-inputs.checkbox>
        </x-inputs.group>
        @endforeach

        </div>
    @endforeach
    @endisset
    {{$detailKomponen}}
    <br>{{$komponen2}}

        <!-- <x-inputs.group>
            <x-inputs.checkbox
                name="indikatorLED"
                label="Indikator LED"
                :checked="old('indikatorLED', ($editing ? $komponen->indikatorLED : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>



        <x-inputs.group>
            <x-inputs.text
                name="namaKomponen"
                label="Nama Komponen"
                :value="old('namaKomponen', ($editing ? $komponen->namaKomponen : ''))"
                maxlength="255"
                placeholder="Nama Komponen"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="indikatorLED2"
                label="Indikator LED"
                :checked="old('indikatorLED2', ($editing ? $komponen->indikatorLED2 : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="testSMSRTC"
                label="Test SMS Manual dan Setting RTC"
                :checked="old('testSMSRTC', ($editing ? $komponen->testSMSRTC : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.text
                name="namaKomponen"
                label="Nama Komponen"
                :value="old('namaKomponen', ($editing ? $komponen->namaKomponen : ''))"
                maxlength="255"
                placeholder="Nama Komponen"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="kondisiAlatAC"
                label="Pemeriksaan Kondisi Alat"
                :checked="old('KondisiAlatAC', ($editing ? $komponen->KondisiAlatAC : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="sambunganKabelAC"
                label="Pemeriksaan Sambungan Kabel"
                :checked="old('sambunganKabelAC', ($editing ? $komponen->sambunganKabelAC : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.text
                name="namaKomponen"
                label="Nama Komponen"
                :value="old('namaKomponen', ($editing ? $komponen->namaKomponen : ''))"
                maxlength="255"
                placeholder="Nama Komponen"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="kondisiAlatDC"
                label="Pemeriksaan Kondisi Alat"
                :checked="old('KondisiAlatDC', ($editing ? $komponen->KondisiAlatDC : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="sambunganKabelDC"
                label="Pemeriksaan Sambungan Kabel"
                :checked="old('sambunganKabelDC', ($editing ? $komponen->sambunganKabelDC : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="settingTippingBricket"
                label="Setting Tipping Bricket"
                :checked="old('settingTippingBricket', ($editing ? $komponen->settingTippingBricket : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.text
                name="sebelumKalibrasiSimulasi"
                label="Sebelum Kalibrasi (Simulasi)"
                :value="old('sebelumKalibrasiSimulasi', ($editing ? $komponen->sebelumKalibrasiSimulasi : ''))"
                maxlength="255"
                placeholder="Simulasi"
                required
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.text
                name="sebelumKalibrasiDisplay"
                label="Sebelum Kalibrasi (Display)"
                :value="old('sebelumKalibrasiDisplay', ($editing ? $komponen->sebelumKalibrasiDisplay : ''))"
                maxlength="255"
                placeholder="Display"
                required
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.text
                name="sesudahKalibrasiSimulasi"
                label="Sesudah Kalibrasi (Simulasi)"
                :value="old('sesudahKalibrasiSimulasi', ($editing ? $komponen->sesudahKalibrasiSimulasi : ''))"
                maxlength="255"
                placeholder="Simulasi"
                required
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.text
                name="sesudahKalibrasiDisplay"
                label="Sesudah Kalibrasi (Display)"
                :value="old('sesudahKalibrasiDisplay', ($editing ? $komponen->sesudahKalibrasiDisplay : ''))"
                maxlength="255"
                placeholder="Display"
                required
            ></x-inputs.checkbox>
        </x-inputs.group>
    </div>

    <div class="col-md-6">
        <x-inputs.group>
            <x-inputs.text
                name="namaKomponen"
                label="Nama Komponen"
                :value="old('namaKomponen', ($editing ? $komponen->namaKomponen : ''))"
                maxlength="255"
                placeholder="Nama Komponen"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="kondisiAlatBat"
                label="Pemeriksaan Kondisi Alat"
                :checked="old('kondisiAlatBat', ($editing ? $komponen->kondisiAlatBat : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="sambunganKabelBat"
                label="Pemeriksaan Sambungan Kabel"
                :checked="old('sambunganKabelBat', ($editing ? $komponen->sambunganKabelBat : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.text
                name="namaKomponen"
                label="Nama Komponen"
                :value="old('namaKomponen', ($editing ? $komponen->namaKomponen : ''))"
                maxlength="255"
                placeholder="Nama Komponen"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="kondisiAlatGSM"
                label="Pemeriksaan Kondisi Alat"
                :checked="old('KondisiAlatGSM', ($editing ? $komponen->KondisiAlatGSM : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="sambunganKabelGSM"
                label="Pemeriksaan Sambungan Kabel"
                :checked="old('sambunganKabelGSM', ($editing ? $komponen->sambunganKabelGSM : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.text
                name="namaKomponen"
                label="Nama Komponen"
                :value="old('namaKomponen', ($editing ? $komponen->namaKomponen : ''))"
                maxlength="255"
                placeholder="Nama Komponen"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="levelAirAki"
                label="Pemeriksaan Level Air Aki"
                :checked="old('levelAirAki', ($editing ? $komponen->levelAirAki : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="sambunganKabelAki"
                label="Pemeriksaan Sambungan Kabel"
                :checked="old('sambunganKabelAki', ($editing ? $komponen->sambunganKabelAki : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.text
                name="namaKomponen"
                label="Nama Komponen"
                :value="old('namaKomponen', ($editing ? $komponen->namaKomponen : ''))"
                maxlength="255"
                placeholder="Nama Komponen"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="kondisiAlatPLN"
                label="Pemeriksaan Kondisi Alat"
                :checked="old('KondisiAlatPLN', ($editing ? $komponen->KondisiAlatPLN : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="sambunganKabelDC"
                label="Pemeriksaan Sambungan Kabel"
                :checked="old('sambunganKabelDC', ($editing ? $komponen->sambunganKabelDC : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.checkbox
                name="settingSensorWaterLevel"
                label="Setting Sensor Water Level"
                :checked="old('settingTippingBricket', ($editing ? $komponen->settingTippingBricket : 0))"
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.text
                name="sebelumKalibrasiAktual"
                label="Sebelum Kalibrasi (Aktual)"
                :value="old('sebelumKalibrasiAktual', ($editing ? $komponen->sebelumKalibrasiAktual : ''))"
                maxlength="255"
                placeholder="Aktual"
                required
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.text
                name="sebelumKalibrasiDisplay2"
                label="Sebelum Kalibrasi (Display)"
                :value="old('sebelumKalibrasiDisplay2', ($editing ? $komponen->sebelumKalibrasiDisplay2 : ''))"
                maxlength="255"
                placeholder="Display"
                required
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.text
                name="sesudahKalibrasiAktual"
                label="Sesudah Kalibrasi (Aktual)"
                :value="old('sesudahKalibrasiAktual', ($editing ? $komponen->sesudahKalibrasiAktual : ''))"
                maxlength="255"
                placeholder="Simulasi"
                required
            ></x-inputs.checkbox>
        </x-inputs.group>

        <x-inputs.group>
            <x-inputs.text
                name="sesudahKalibrasiDisplay"
                label="Sesudah Kalibrasi (Display)"
                :value="old('sesudahKalibrasiDisplay', ($editing ? $komponen->sesudahKalibrasiDisplay : ''))"
                maxlength="255"
                placeholder="Display"
                required
            ></x-inputs.checkbox>
        </x-inputs.group> --}}

</div>
