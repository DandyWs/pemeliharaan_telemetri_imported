@php $editing = isset($pemeriksaan) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="hasilPemeriksaan"
            label="Hasil Pemeriksaan"
            :checked="old('hasilPemeriksaan', ($editing ? $pemeriksaan->hasilPemeriksaan : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="catatan"
            label="Catatan"
            :value="old('catatan', ($editing ? $pemeriksaan->catatan : ''))"
            maxlength="255"
            placeholder="Catatan"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="pemeliharaan_id" label="Pemeliharaan" required>
            @php $selected = old('pemeliharaan_id', ($editing ? $pemeriksaan->pemeliharaan_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Pemeliharaan</option>
            @foreach($pemeliharaans as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $pemeriksaan->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="komponen_id" label="Komponen">
            @php $selected = old('komponen_id', ($editing ? $pemeriksaan->komponen_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Komponen</option>
            @foreach($komponens as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="setting_id" label="Setting">
            @php $selected = old('setting_id', ($editing ? $pemeriksaan->setting_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Setting</option>
            @foreach($settings as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
