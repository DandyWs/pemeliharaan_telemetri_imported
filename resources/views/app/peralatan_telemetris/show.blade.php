@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('peralatan-telemetris.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.peralatan_telemetris.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.peralatan_telemetris.inputs.namaAlat')</h5>
                    <span>{{ $peralatanTelemetri->namaAlat ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.peralatan_telemetris.inputs.serialNumber')
                    </h5>
                    <span>{{ $peralatanTelemetri->serialNumber ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.peralatan_telemetris.inputs.lokasiStasiun')
                    </h5>
                    <span>{{ $peralatanTelemetri->lokasiStasiun ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.peralatan_telemetris.inputs.jenis_peralatan_id')
                    </h5>
                    <span
                        >{{
                        optional($peralatanTelemetri->jenisPeralatan)->namaJenisAlat
                        ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('peralatan-telemetris.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\PeralatanTelemetri::class)
                <a
                    href="{{ route('peralatan-telemetris.create') }}"
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
