<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">
    <div class="container">
        
        <a class="navbar-brand text-primary font-weight-bold text-uppercase" href="{{ url('/') }}">
            Jasa Tirta I
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
                <div class="mt-1 d-flex" name="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="profile rounded-circle mr-2">
                        @if (Auth::user()->name == "admin")
                            <img src="assets/dist/img/profile.png" class="" alt="User Image" width="40px">
                        @elseif(Auth::user()->name == "nasabah")
                          @if (empty($mekanik->foto))
                              <img src="assets/dist/img/profile.png" class="" alt="User Image" width="40px">
                          @else
                              <img src="{{asset('storage/nasabahprofile/'.$mekanik->foto)}}" class="elevation-2 img-fluid img-thumbnail rounded-circle" width="40px" alt="User Image">
                          @endif
                        @else
                          @if (empty($manager->foto))
                              <img src="assets/dist/img/profile.png" class="" alt="User Image" width="40px">
                          @else
                            <img src="{{asset('storage/sopirprofile/'.$manager->foto)}}" class="elevation-2 img-fluid img-thumbnail rounded-circle" width="40px" alt="User Image">
                          @endif
                       @endif
                    </div>
                </div>

                        <div class="dropdown-menu dropdown-menu-right fade" style="min-width: 0; border: none; padding: 0;">
                            <a class="dropdown-item btn btn-success" data-toggle="modal" data-target="#detailModal">
                                <i class="fas fa-info-circle mr-2"></i> Detail
                            </a>
                            @if (Auth::user()->name == "admin")
                              <a class="dropdown-item btn btn-success" data-toggle="modal" data-target="" style="pointer-events: none; cursor: default; opacity: 0.5;">
                                  <i class="fas fa-edit mr-2"></i> Edit
                              </a>                    
                              @elseif (Auth::user()->name == "mekanik")
                              <a class="dropdown-item btn btn-success" data-toggle="modal">
                                  <i class="fas fa-edit mr-2"></i> Edit
                              </a>
                              @else
                              <a class="dropdown-item btn btn-success" data-toggle="modal">
                                  <i class="fas fa-edit mr-2"></i> Edit
                              </a>
                              @endif
                              <a class="dropdown-item btn btn-success" data-toggle="modal" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
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
