@php $editing = isset($jenisPeralatan) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="namajenis"
            label="Nama Jenis Alat"
            :value="old('namajenis', ($editing ? $jenisPeralatan->namajenis : ''))"
            maxlength="255"
            placeholder="Nama Jenis Alat"
            required
        ></x-inputs.text>
        <x-inputs.checkbox class="col-sm-12"
            name="setting"
            label="Setting Alat"
            :checked="old('setting', ($editing ? $jenisPeralatan->setting : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>
</div>
