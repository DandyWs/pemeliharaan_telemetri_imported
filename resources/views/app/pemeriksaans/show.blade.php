@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('pemeriksaans.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.pemeriksaans.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.pemeriksaans.inputs.hasilPemeriksaan')</h5>
                    <span>{{ $pemeriksaan->hasilPemeriksaan ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pemeriksaans.inputs.catatan')</h5>
                    <span>{{ $pemeriksaan->catatan ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pemeriksaans.inputs.pemeliharaan_id')</h5>
                    <span
                        >{{
                        optional($pemeriksaan->pemeliharaan)->periodePemeliharaan
                        ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pemeriksaans.inputs.user_id')</h5>
                    <span>{{ optional($pemeriksaan->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pemeriksaans.inputs.komponen_id')</h5>
                    <span
                        >{{ optional($pemeriksaan->komponen)->namaKomponen ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pemeriksaans.inputs.setting_id')</h5>
                    <span
                        >{{ optional($pemeriksaan->setting)->namaSetting ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('pemeriksaans.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Pemeriksaan::class)
                <a
                    href="{{ route('pemeriksaans.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
