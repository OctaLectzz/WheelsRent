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
                    <a href="{{ route('home') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                {{-- Transaksi --}}
                <li class="nav-item has-treeview {{ Request::is('dashboard/transaksi*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('dashboard/transaksi*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-shopping-cart"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('transaksi.semua') }}" class="nav-link {{ Request::is('dashboard/transaksi/semuaTransaksi') ? 'active' : '' }}">
                                <i class="fa fa-chart-bar nav-icon ms-3"></i>
                                <p>Semua Transaksi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transaksi.belumBayar') }}" class="nav-link {{ Request::is('dashboard/transaksi/belumBayar') ? 'active' : '' }}">
                                <i class="fa fa-not-equal nav-icon ms-3"></i>
                                <p>Belum Bayar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transaksi.proses') }}" class="nav-link {{ Request::is('dashboard/transaksi/proses') ? 'active' : '' }}">
                                <i class="fa fa-spinner nav-icon ms-3"></i>
                                <p>Proses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transaksi.selesai') }}" class="nav-link {{ Request::is('dashboard/transaksi/selesai') ? 'active' : '' }}">
                                <i class="fa fa-check-square nav-icon  ms-3"></i>
                                <p>Selesai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transaksi.batal') }}" class="nav-link {{ Request::is('dashboard/transaksi/batal') ? 'active' : '' }}">
                                <i class="fa fa-ban nav-icon ms-3"></i>
                                <p>Dibatalkan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Mobil --}}
                <li class="nav-item">
                    <a href="{{ route('mobil.index') }}" class="nav-link {{ Request::is('dashboard/mobil*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-car"></i>
                        <p>Mobil</p>
                    </a>
                </li>

                {{-- Armada --}}
                <li class="nav-item">
                    <a href="{{ route('armada.index') }}" class="nav-link {{ Request::is('dashboard/armada*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-train"></i>
                        <p>Armada</p>
                    </a>
                </li>

                {{-- Supir --}}
                <li class="nav-item">
                    <a href="{{ route('supir.index') }}" class="nav-link {{ Request::is('dashboard/supir*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-address-card"></i>
                        <p>
                            Supir
                        </p>
                    </a>
                </li>

                {{-- Customer --}}
                <li class="nav-item">
                    <a href="{{ route('customer.index') }}" class="nav-link {{ Request::is('dashboard/customer*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Customer
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
    
</aside>