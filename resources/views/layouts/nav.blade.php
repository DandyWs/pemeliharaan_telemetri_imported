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

</nav>
