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
                          <b><h1>Dashboard K.A Kalibrasi </h1></b>
                        </div>
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                          </ol>
                        </div>
                      </div>

                        <div class="card-header border-0">
                            <!-- Main content -->
                            <div class="card">
                                <div class="card-header">
                                  <h3 class="card-title"><i class="nav-icon fas fa-home"></i> Dashboard</h3>
                                </div>
                                <div class="card-body">
                        <section class="content">

                        <!-- Default box -->
                        <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                              <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                  <div class="inner">
                                    {{-- <h3>{{ $hitungNasabah }}</h3> --}}
                                    <p>User</p>
                                  </div>
                                  <div class="icon d-flex align-items-center justify-content-center">
                                    <i class="nav-icon icon ion-md-users" style="font-size: 2.5rem;"></i>
                                </div>
                                  <a href="{{ url('/user') }}" class="small-box-footer">More info <i class="nav-icon icon ion-md-arrow-forward" style="font-size: 1.5rem;"></i></a>
                                </div>
                              </div>
                              <!-- ./col -->
                              <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                  <div class="inner">
                                    {{-- <h3>{{ $hitungSopir }}</h3> --}}
                                    <p>Stasiun</p>
                                  </div>
                                  <div class="icon d-flex align-items-center justify-content-center">
                                    <i class="nav-icon icon ion-md-home" style="font-size: 2.5rem;"></i>
                                </div>
                                  <a href="{{ url('/sopir') }}" class="small-box-footer">More info <i class="nav-icon icon ion-md-arrow-forward" style="font-size: 1.5rem;"></i></a>
                                </div>
                              </div>
                              <!-- ./col -->
                              <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                  <div class="inner">
                                    {{-- <h3>{{ $hitungSampah }}</h3> --}}
                                    <p>Form Report</p>
                                  </div>
                                  <div class="icon d-flex align-items-center justify-content-center">
                                    <i class="nav-icon icon ion-md-archive" style="font-size: 2.5rem;"></i>
                                </div>
                                  <a href="{{ url('/Form') }}" class="small-box-footer">More info <i class="nav-icon icon ion-md-arrow-forward" style="font-size: 1.5rem;"></i></a>
                                </div>
                              </div>
                              <!-- ./col -->
                              <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                  <div class="inner">
                                    {{-- <h3>{{ $hitungJadwal }}</h3> --}}
                                    <p>Jadwal Pemeliharaan</p>
                                  </div>
                                  <div class="icon d-flex align-items-center justify-content-center">
                                    <i class="nav-icon icon ion-md-time" style="font-size: 2.5rem;"></i>
                                </div>
                                  <a href="{{ url('/jadwal') }}" class="small-box-footer">More info <i class="nav-icon icon ion-md-arrow-forward" style="font-size: 1.5rem;"></i></a>
                                </div>
                              </div>
                              <!-- ./col -->
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <b>Data Form Report</b>
                                </div>
                                <div class="row d-flex justify-between" style="width: 100%; justify-content: space-between; align-items: center; margin: 0">
                                    <form class="form" method="GET" action="{{ url('transaksi') }}" class="col-md-4" style="padding: 0">
                                      <div class="form-group w-100 mb-3">
                                      </div>
                                    </form>
                                </div>
                            </div>


                                    <div class="card-body">

                                        <table class="table table-bordered table-striped">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Tanggal</th>
                                              <th>Nama</th>
                                              <th>Stasiun</th>
                                              <th>Jenis Alat</th>
                                              <th>petugas</th>
                                              <th>Hasil</th>
                                              <th>Keterangan</th>
                                              <th>actions</th>
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
