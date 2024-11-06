<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="https://eoffice.jasatirta1.co.id/domcfg.nsf/logo_jastir1.png" alt="Logo PJT I" class="brand-image">
        <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-pulse"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    @can('view-any', App\Models\User::class)
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-apps"></i>
                        <p>
                            Apps
                            <i class="nav-icon right icon ion-md-caret-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                            @can('view-any', App\Models\User::class)
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>User Management</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Pemeriksaan::class)
                            <li class="nav-item">
                                <a href="{{ route('pemeriksaans.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Pemeriksaans</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Pemeliharaan::class)
                            <li class="nav-item">
                                <a href="{{ route('pemeliharaans.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Pemeliharaans</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\JenisPeralatan::class)
                            <li class="nav-item">
                                <a href="{{ route('jenis-peralatans.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Jenis Peralatans</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\PeralatanTelemetri::class)
                            <li class="nav-item">
                                <a href="{{ route('peralatan-telemetris.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Peralatan Telemetris</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Komponen::class)
                            <li class="nav-item">
                                <a href="{{ route('komponens.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Komponens</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Setting::class)
                            <li class="nav-item">
                                <a href="{{ route('settings.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Settings</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Pemeliharaan::class)
                            <li class="nav-item">
                                <a href="{{ route('pemeliharaans.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Forms</p>
                                </a>
                            </li>
                            @endcan
                    </ul>
                    @endcan
                </li>
            
                @can('view-any', App\Models\Pemeliharaan::class)
                <li class="nav-item">
                    <a href="{{ route('pemeliharaans.index') }}" class="nav-link">
                    <i class="nav-icon icon ion-md-apps"></i>
                    <p>Form Pemeliharaan</p>
                    </a>
                </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-md-exit"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth 
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>