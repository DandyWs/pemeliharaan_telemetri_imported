@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Setting::class)
                <a
                    href="{{ route('settings.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <b>Setting List</b>
        </div>
        <div class="row d-flex justify-between" style="width: 100%; justify-content: space-between; align-items: center; margin: 0">
            <form class="form" method="GET" action="@lang('crud.forms.index_title')" class="col-md-4" style="width: 100%; padding: 0">
              <div class="form-group w-100 mb-3">
              </div>
        <div class="card-body">


            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">
                                @lang('crud.settings.inputs.namaSetting')
                            </th>
                            <th class="text-center">
                                @lang('crud.settings.inputs.nilaiSebelumKalibrasi')
                            </th>
                            <th class="text-center">
                                @lang('crud.settings.inputs.displaySebelumKalibrasi')
                            </th>
                            {{-- <th class="text-center">
                                @lang('crud.settings.inputs.nilaiSetelahKalibrasi')
                            </th> --}}
                            <th class="text-center">
                                @lang('crud.settings.inputs.displaySetelahKalibrasi')
                            </th>
                            <th class="text-center">
                                @lang('crud.settings.inputs.peralatan_telemetri_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($settings as $setting)
                        <tr>
                            <td class="text-center">@php
                                $number = ($settings->currentPage() - 1) * $settings->perPage() + $loop->iteration;
                            @endphp
                            {{ $number }}</td>
                            <td class="text-center">{{ optional($setting->formKomponen->detailKomponen)->namadetail ?? '-' }}</td>
                            <td class="text-center">
                                {{ $setting->simulasi ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $setting->display ?? '-' }}
                            </td>
                            {{-- <td class="text-center">
                                {{ $setting->nilaiSetelahKalibrasi ?? '-' }}
                            </td> --}}
                            <td class="text-center">
                                {{ optional($setting->formKomponen->pemeliharaan2->alatTelemetri)->lokasiStasiun ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{
                                optional($setting->formKomponen->pemeliharaan2->alatTelemetri->jenisAlat)->namajenis
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $setting)
                                    <a
                                        href="{{ route('settings.edit', $setting) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $setting)
                                    <a
                                        href="{{ route('settings.show', $setting) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $setting)
                                    <form
                                        action="{{ route('settings.destroy', $setting) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">{!! $settings->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
