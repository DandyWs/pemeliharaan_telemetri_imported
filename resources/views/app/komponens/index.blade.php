@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.komponens.index_title')</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
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
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\Komponen::class)
                        <a
                            href="{{ route('komponens.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.komponens.inputs.namaKomponen')
                            </th>
                            <th class="text-left">
                                @lang('crud.komponens.inputs.indikatorLED')
                            </th>
                            <th class="text-left">
                                @lang('crud.komponens.inputs.simCard')
                            </th>
                            <th class="text-left">
                                @lang('crud.komponens.inputs.kondisiAlat')
                            </th>
                            <th class="text-left">
                                @lang('crud.komponens.inputs.sambunganKabel')
                            </th>
                            <th class="text-left">
                                @lang('crud.komponens.inputs.perawatanSonde')
                            </th>
                            <th class="text-left">
                                @lang('crud.komponens.inputs.testDanSettingRTC')
                            </th>
                            <th class="text-left">
                                @lang('crud.komponens.inputs.levelAirAki')
                            </th>
                            <th class="text-left">
                                @lang('crud.komponens.inputs.teganganBateraiAki')
                            </th>
                            <th class="text-left">
                                @lang('crud.komponens.inputs.peralatan_telemetri_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($komponens as $komponen)
                        <tr>
                            <td>{{ $komponen->namaKomponen ?? '-' }}</td>
                            <td>{{ $komponen->indikatorLED ?? '-' }}</td>
                            <td>{{ $komponen->simCard ?? '-' }}</td>
                            <td>{{ $komponen->kondisiAlat ?? '-' }}</td>
                            <td>{{ $komponen->sambunganKabel ?? '-' }}</td>
                            <td>{{ $komponen->perawatanSonde ?? '-' }}</td>
                            <td>{{ $komponen->testDanSettingRTC ?? '-' }}</td>
                            <td>{{ $komponen->levelAirAki ?? '-' }}</td>
                            <td>{{ $komponen->teganganBateraiAki ?? '-' }}</td>
                            <td>
                                {{
                                optional($komponen->peralatanTelemetri)->namaAlat
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $komponen)
                                    <a
                                        href="{{ route('komponens.edit', $komponen) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $komponen)
                                    <a
                                        href="{{ route('komponens.show', $komponen) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $komponen)
                                    <form
                                        action="{{ route('komponens.destroy', $komponen) }}"
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
                            <td colspan="11">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="11">{!! $komponens->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
