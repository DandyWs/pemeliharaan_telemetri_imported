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
                @can('create', App\Models\PeralatanTelemetri::class)
                <a
                    href="{{ route('peralatan-telemetris.create') }}"
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
            <b>Peralatan Telemetri List</b>
        </div>
        <div class="row d-flex justify-between" style="width: 100%; justify-content: space-between; align-items: center; margin: 0">
            <form class="form" method="GET" action="@lang('crud.forms.index_title')" class="col-md-4" style="padding: 0">
              <div class="form-group w-100 mb-3">
              </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-left">
                                @lang('crud.peralatan_telemetris.inputs.namaAlat')
                            </th>
                            <th class="text-left">
                                @lang('crud.peralatan_telemetris.inputs.serialNumber')
                            </th>
                            <th class="text-left">
                                @lang('crud.peralatan_telemetris.inputs.lokasiStasiun')
                            </th>
                            <th class="text-left">
                                @lang('crud.peralatan_telemetris.inputs.jenis_peralatan_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peralatanTelemetris as $peralatanTelemetri)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $peralatanTelemetri->namaAlat ?? '-' }}</td>
                            <td>
                                {{ $peralatanTelemetri->serialNumber ?? '-' }}
                            </td>
                            <td>
                                {{ $peralatanTelemetri->lokasiStasiun ?? '-' }}
                            </td>
                            <td>
                                {{
                                optional($peralatanTelemetri->jenisPeralatan)->namaJenisAlat
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $peralatanTelemetri)
                                    <a
                                        href="{{ route('peralatan-telemetris.edit', $peralatanTelemetri) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $peralatanTelemetri)
                                    <a
                                        href="{{ route('peralatan-telemetris.show', $peralatanTelemetri) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $peralatanTelemetri)
                                    <form
                                        action="{{ route('peralatan-telemetris.destroy', $peralatanTelemetri) }}"
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
                            <td colspan="5">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                {!! $peralatanTelemetris->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
