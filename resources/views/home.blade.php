@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @section('content')
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat datang di aplikasi Form Pemeliharaan Jasa Tirta I, selamat bekerja
                    {{ Auth::user()->name }}
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-12 grid-margin">
                    @if (session('message'))
                        <h6 class="alert alert-success">{{ session('message')}},</h6>
                    @endif
                    </div>
                </div>
                <section class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <b><h1>Dashboard {{ Auth::user()->role }}</h1></b>
                        </div>
                      </div>

                        <div class="card-header border-0">
                            <!-- Main content -->
                            <div class="card">
                                <div class="card-header">
                                  <h3 class="card-title"><i class="nav-icon icon ion-md-pulse"></i> Dashboard</h3>
                                </div>
                                <div class="card-body">
                        <section class="content">

                                <!-- Default box -->
                                <div class="container-fluid">
                                    <!-- Small boxes (Stat box) -->
                                    <div class="row">
                                        <div class="col-lg-4 col-6">
                                            <!-- small box -->
                                            @if (Auth::user()->role == 'admin')
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>{{ $countUser }}</h3>
                                                    <p>User</p>
                                                </div>
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <i class="nav-icon icon ion-md-users" style="font-size: 2.5rem;"></i>
                                                </div>
                                                <a href="{{ url('/users') }}" class="small-box-footer">More info <i class="nav-icon icon ion-md-arrow-forward" style="font-size: 1.5rem;"></i></a>
                                            </div>
                                            @else
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>{{ $countPemeriksaan }}</h3>
                                                    <p>Form Pemeriksaan</p>
                                                </div>
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <i class="nav-icon icon ion-md-document" style="font-size: 2.5rem;"></i>
                                                </div>
                                                <a href="{{ url('/pemeriksaans') }}" class="small-box-footer">More info <i class="nav-icon icon ion-md-arrow-forward" style="font-size: 1.5rem;"></i></a>
                                            </div>
                                            @endif
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-4 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h3>{{ $countPemeliharaan }}</h3>
                                                    <p>Form Pemeliharaan</p>
                                                </div>
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <i class="nav-icon icon ion-md-create" style="font-size: 2.5rem;"></i>
                                                </div>
                                                <a href="{{ url('/pemeliharaans') }}" class="small-box-footer">More info <i class="nav-icon icon ion-md-arrow-forward" style="font-size: 1.5rem;"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-4 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-danger">
                                                <div class="inner">
                                                    <h3>{{ $countPeralatanTelemetri }}</h3>
                                                    <p>Jumlah Alat</p>
                                                </div>
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <i class="nav-icon icon ion-md-calendar" style="font-size: 2.5rem;"></i>
                                                </div>
                                                <a href="{{ url('/peralatan-telemetris') }}" class="small-box-footer">More info <i class="nav-icon icon ion-md-arrow-forward" style="font-size: 1.5rem;"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <b>Data Form Pemeliharaan</b>
                                </div>
                                <div class="row d-flex justify-between" style="width: 100%; justify-content: space-between; align-items: center; margin: 0">
                                    <form class="form" method="GET" action="{{ url('transaksi') }}" class="col-md-4" style="padding: 0">
                                      <div class="form-group w-100 mb-3">
                                      </div>
                                    </form>

                                    <div class="card-body">

                                        <table class="table table-bordered table-striped">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Tanggal</th>
                                              <th>Jenis Alat</th>
                                              <th>petugas</th>
                                              <th>Peralatan Telemetri</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            {{-- @if ($transaksi ->count() > 0)
                                              @foreach ($transaksi as $i => $k)
                                                <tr>
                                                  <td>{{++$i}}</td>
                                                  <td>{{$k->id_jadwal}}</td>
                                                  <td>{{$k->nasabah->nama}}</td>
                                                  <td>{{$k->sopir->id_sopir ?? "Sopir tidak ada"}}</td>
                                                  @if($k->tanggal_pengambilan != NULL)
                                                    <td>{{$k->tanggal_pengambilan}}</td>
                                                  @else
                                                    <td>Menunggu Konfirmasi</td>
                                                  @endif
                                                  <td>{{$k->konfirmasi}}</td>
                                                </tr>
                                              @endforeach
                                            @else
                                              <tr>
                                                <td colspan="6" class="text-center">Data tidak ada</td>
                                              </tr>
                                            @endif --}}
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                </div>
        @endsection
    </div>
</div>
@endsection
