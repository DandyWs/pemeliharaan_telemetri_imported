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
                            <a class="dropdown-item btn btn-success" href="{{ url('/logout') }}">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                        </div>
                    </li>
            @endguest
        </ul>
    </div>
</nav>
