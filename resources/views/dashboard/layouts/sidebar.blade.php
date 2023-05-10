<aside class="main-sidebar sidebar-dark-warning elevation-4">

    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('vendor/admin-lte/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light fs-5">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (auth()->user()->images)
                    <img src="{{ asset('storage/images/' . Auth::user()->images) }}" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{ asset('img/user-profile-default.jpg') }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{ route('dashboard.profile') }}" class="d-block">{{ Auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

               {{-- Home --}}
               <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Request::is('dashboard', 'home') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                {{-- Mobil --}}
                <li class="nav-item has-treeview {{ Request::is('dashboard/mobil*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('dashboard/mobil*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Mobil
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('mobil.index') }}" class="nav-link {{ Request::is('dashboard/mobil') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-list ms-3"></i>
                                <p>Semua Mobil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mobil.armada') }}" class="nav-link {{ Request::is('dashboard/mobil/armada') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-car ms-3"></i>
                                <p>Armada Mobil</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Supir --}}
                <li class="nav-item">
                    <a href="{{ route('supir.index') }}" class="nav-link {{ Request::is('dashboard/supir*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Supir
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
    
</aside>