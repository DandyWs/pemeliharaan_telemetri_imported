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
                @can('create', App\Models\Pemeriksaan::class)
                <a
                    href="{{ route('pemeriksaans.create') }}"
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
            <b>Pemeriksaan List</b>
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
                            <th class="text-left">
                                @lang('crud.pemeriksaans.inputs.hasilPemeriksaan')
                            </th>
                            <th class="text-left">
                                @lang('crud.pemeriksaans.inputs.catatan')
                            </th>
                            <th class="text-left">
                                @lang('crud.pemeriksaans.inputs.pemeliharaan_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.pemeriksaans.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.pemeriksaans.inputs.komponen_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.pemeriksaans.inputs.setting_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pemeriksaans as $pemeriksaan)
                        <tr>
                            <td>{{ $pemeriksaan->hasilPemeriksaan ?? '-' }}</td>
                            <td>{{ $pemeriksaan->catatan ?? '-' }}</td>
                            <td>
                                {{
                                optional($pemeriksaan->pemeliharaan)->periodePemeliharaan
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($pemeriksaan->user)->name ?? '-' }}
                            </td>
                            <td>
                                {{
                                optional($pemeriksaan->komponen)->namaKomponen
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($pemeriksaan->setting)->namaSetting
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $pemeriksaan)
                                    <a
                                        href="{{ route('pemeriksaans.edit', $pemeriksaan) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $pemeriksaan)
                                    <a
                                        href="{{ route('pemeriksaans.show', $pemeriksaan) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $pemeriksaan)
                                    <form
                                        action="{{ route('pemeriksaans.destroy', $pemeriksaan) }}"
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
                            <td colspan="7">{!! $pemeriksaans->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
