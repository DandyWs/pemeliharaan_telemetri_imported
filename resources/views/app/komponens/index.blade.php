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
                @can('create', App\Models\Komponen::class)
                <a
                    href="{{ route('komponens.create') }}"
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
            <b>Komponen List</b>
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
                                @lang('crud.komponens.inputs.nama')
                            </th>
                            {{-- <th class="text-left">
                                @lang('crud.komponens.inputs.peralatan_telemetri_id')
                            </th> --}}
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($komponens as $komponen)
                        <tr>
                            <td class="text-center">@php
                                $number = ($komponens->currentPage() - 1) * $komponens->perPage() + $loop->iteration;
                            @endphp
                            {{ $number }}</td>
                            <td class="text-center">{{ $komponen->nama ?? '-' }}</td>
                            {{-- <td>
                                {{
                                optional($komponen->peralatanTelemetri)->namaAlat
                                ?? '-' }}
                            </td> --}}
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
