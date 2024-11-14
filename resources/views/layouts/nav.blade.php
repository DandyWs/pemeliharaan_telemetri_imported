<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">
    <div class="container">

        <a class="navbar-brand text-primary font-weight-bold text-uppercase" href="{{ url('/') }}">
        <img src="https://jasatirta1.co.id/wp-content/uploads/2022/01/az-1-1.png" alt="Logo" class="img-fluid mx-auto d-block" width="150" height="150">
        </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                </a>
            </li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif

        @else
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <div class="profile rounded-circle mr-2">
                        @if (empty(Auth::user()->profile_photo_path))
                            <img src="public/img/profile.png" alt="" width="40px">
                        @else
                            <img src="{{ asset('storage/profiles/' . Auth::user()->profile_photo_path) }}" class="elevation-2 img-fluid img-thumbnail rounded-circle" width="40px" alt="">
                        @endif
                    </div>
                    <span>{{ Auth::user()->name }}</span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                <div class="text-center">
                    @if (empty(Auth::user()->profile_photo_path))
                        <img src="assets/dist/img/profile.png" alt="Profile" class="rounded-circle" style="width: 80px; height: 80px;">
                    @else
                        <img src="{{ asset('storage/profiles/' . Auth::user()->profile_photo_path) }}" class="rounded-circle" style="width: 80px; height: 80px;" alt="">
                    @endif
                    <h5>{{ Auth::user()->name }}</h5>
                    <p>{{ Auth::user()->email }}</p>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">
                    <i class="nav-icon icon ion-md-eye"></i> Detail
                </a>
                <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">
                    <i class="nav-icon icon ion-md-create"></i> Edit
                </a>
                <a class="dropdown-item btn btn-success" data-toggle="modal" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="nav-icon icon ion-md-exit"></i>
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               @csrf
                </form>
            </div>
        </li>
        @endguest
        </ul>
    </div>
  <!-- Modal Detail-->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail
                    {{-- {{ auth()->user()->name }} --}}
                </h5>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <div class="image-preview">
                        {{-- @if (Auth::user()->name == "admin") --}}
                            <img src="assets/dist/img/profile.png" class="rounded-circle" width="100px" alt="User Image">
                        {{-- @elseif(Auth::user()->name== "nasabah")
                            @if (empty($mekanik->foto))
                                <img src="assets/dist/img/profile.png" class="" alt="User Image" width="100px">
                            @else
                                <img src="{{asset('storage/nasabahprofile/'.$mekanik->foto)}}" class="img-thumbnail" alt="User Image">
                            @endif
                        @else
                            @if (empty($manager->foto))
                                <img src="assets/dist/img/profile.png" class="" alt="User Image" width="40px">
                            @else
                                <img src="{{asset('storage/sopirprofile/'.$manager->foto)}}" class="elevation-2 img-fluid img-thumbnail rounded-circle" width="40px" alt="User Image">
                            @endif --}}
                        {{-- @endif --}}
                    </div>
                </div>
                {{-- @if (Auth::user()->name == "admin") --}}
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                      <div class="d-flex justify-content-between align-items-center">
                          <b>Nama</b>
                          <span>
                            {{-- {{ auth()->user()->name }} --}}
                          </span>
                      </div>
                  </li>
                  <li class="list-group-item">
                      <div class="d-flex justify-content-between align-items-center">
                          <b>Email</b>
                          <span>
                            {{-- {{ auth()->user()->email }} --}}
                          </span>
                      </div>
                  </li>
                </ul>
                {{-- @elseif (Auth::user()->name == "manager") --}}
                {{-- <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                      <div class="d-flex justify-content-between align-items-center">
                          <b>Nama</b>
                          <span>
                            {{ Auth::user()->manager->nama }}
                          </span>
                      </div>
                  </li>
                  <li class="list-group-item">
                      <div class="d-flex justify-content-between align-items-center">
                          <b>Email</b>
                          <span>
                            {{ Auth::user()->manager->email }}
                          </span>
                      </div>
                  </li>
                </ul>
                @else
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                      <div class="d-flex justify-content-between align-items-center">
                          <b>Nama</b>
                          <span>
                            {{ ->mekanik->nama }}
                          </span>
                      </div>
                  </li>
                  <li class="list-group-item">
                      <div class="d-flex justify-content-between align-items-center">
                          <b>Email</b>
                          <span>
                            {{ ->mekanik->email }}
                          </span>
                      </div>
                  </li>
              </ul>
              @endif --}}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal Edit -->
<div class="modal fade" id="editModalNasabah" tabindex="-1" role="dialog" aria-labelledby="editModalNasabahLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalNasabahLabel"><strong>Edit Nasabah </strong></h5>
        </div>
        <div class="modal-body">
          <form id="editForm" method="POST" action="{{ url('/jadwalnasabah')}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="name">ID Mekanik</label>
                  <input readonly="text" class="form-control @error('id_nasabah') is-invalid @enderror" id="id_nasabah" name="id_nasabah" value="">
                  @error('id_nasabah')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="" placeholder="Masukkan Nama">
                  @error('name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="" placeholder="Masukkan Email">
                  @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary btn-sm btn-success" form="editForm">{{ __('Ubah') }}</button>
        </div>
      </div>
    </div>
  </div>
 </div>

</nav>
