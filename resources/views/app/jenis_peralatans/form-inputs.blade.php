@php $editing = isset($jenisPeralatan) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="namaJenisAlat"
            label="Nama Jenis Alat"
            :value="old('namaJenisAlat', ($editing ? $jenisPeralatan->namaJenisAlat : ''))"
            maxlength="255"
            placeholder="Nama Jenis Alat"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
