@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('settings.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.settings.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.namaSetting')</h5>
                    <span>{{ $setting->namaSetting ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.nilaiSebelumKalibrasi')</h5>
                    <span>{{ $setting->nilaiSebelumKalibrasi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.settings.inputs.displaySebelumKalibrasi')
                    </h5>
                    <span>{{ $setting->displaySebelumKalibrasi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.nilaiSetelahKalibrasi')</h5>
                    <span>{{ $setting->nilaiSetelahKalibrasi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.settings.inputs.displaySetelahKalibrasi')
                    </h5>
                    <span>{{ $setting->displaySetelahKalibrasi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.settings.inputs.peralatan_telemetri_id')
                    </h5>
                    <span
                        >{{ optional($setting->peralatanTelemetri)->namaAlat ??
                        '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('settings.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Setting::class)
                <a href="{{ route('settings.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
