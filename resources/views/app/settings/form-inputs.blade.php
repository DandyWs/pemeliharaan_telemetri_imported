@php $editing = isset($setting) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="simulasi"
            label="Simulasi"
            :value="old('simulasi', ($editing ? $setting->simulasi : ''))"
            maxlength="255"
            placeholder="Nilai Simulasi"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="display"
            label="Display"
            :value="old('display', ($editing ? $setting->display : ''))"
            max="255"
            placeholder="Nilai Display"
            required
        ></x-inputs.number>
    </x-inputs.group>

    {{-- <x-inputs.group class="col-sm-12">
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
    </x-inputs.group> --}}

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="form_komponen_id"
            label="Pilih Form Komponen"
            required
        >
            @php $selected = old('form_komponen_id', ($editing ? $setting->form_komponen_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Form Komponen</option>
            @foreach($formKomponens as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
