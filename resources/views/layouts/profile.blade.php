@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="modal-title">Profil {{ Auth::user()->role }}</h5>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center mb-3">
                        @if (empty(Auth::user()->profile_photo_path))
                            <img src="{{ asset('img/profile.png') }}" class="rounded-circle" width="100px" alt="User Image">
                        @else
                            <img src="{{ asset('storage/profiles/' . Auth::user()->profile_photo_path) }}" class="rounded-circle" width="100px" alt="User Image">
                        @endif
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>Nama</strong>
                                <span>{{ Auth::user()->name }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>Email</strong>
                                <span>{{ Auth::user()->email }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>Role</strong>
                                <span>{{ Auth::user()->role }}</span>
                            </div>
                        </li>
                        <!-- Tampilkan informasi tambahan untuk role tertentu -->
                        @if (Auth::user()->role == 'admin')
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <strong>Total Pengguna</strong>
                                    <span>{{ $countUser }}</span>
                                </div>
                            </li>
                        @elseif (Auth::user()->role == 'mekanik')
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <strong>Total Form Pemeriksaan</strong>
                                    <span>{{ $countPemeriksaan }}</span>
                                </div>
                            </li>
                        @elseif (Auth::user()->role == 'ka.kalibrasi')
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <strong>Total Alat Kalibrasi</strong>
                                    <span>{{ $countPeralatanTelemetri }}</span>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
