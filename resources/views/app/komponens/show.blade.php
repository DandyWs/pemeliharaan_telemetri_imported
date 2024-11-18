@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('komponens.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.komponens.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.komponens.inputs.nama')</h5>
                    <span>{{ $komponen->nama ?? '-' }}</span>
                </div>
                {{-- <div class="mb-4">
                    <h5>@lang('crud.komponens.inputs.indikatorLED')</h5>
                    <span>{{ $komponen->indikatorLED ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.komponens.inputs.simCard')</h5>
                    <span>{{ $komponen->simCard ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.komponens.inputs.kondisiAlat')</h5>
                    <span>{{ $komponen->kondisiAlat ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.komponens.inputs.sambunganKabel')</h5>
                    <span>{{ $komponen->sambunganKabel ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.komponens.inputs.perawatanSonde')</h5>
                    <span>{{ $komponen->perawatanSonde ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.komponens.inputs.testDanSettingRTC')</h5>
                    <span>{{ $komponen->testDanSettingRTC ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.komponens.inputs.levelAirAki')</h5>
                    <span>{{ $komponen->levelAirAki ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.komponens.inputs.teganganBateraiAki')</h5>
                    <span>{{ $komponen->teganganBateraiAki ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.komponens.inputs.peralatan_telemetri_id')
                    </h5>
                    <span
                        >{{ optional($komponen->peralatanTelemetri)->namaAlat ??
                        '-' }}</span
                    >
                </div> --}}
            </div>

            <div class="mt-4">
                <a href="{{ route('komponens.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Komponen::class)
                <a href="{{ route('komponens.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
