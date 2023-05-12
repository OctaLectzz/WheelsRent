<nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                @if (auth()->user()->images)
                    <img src="{{ asset('storage/images/' . auth()->user()->images) }}" alt="{{ auth()->user()->images }}" class="rounded rounded-circle mb-sm-1" width="30" style="border: 1px rgb(150, 150, 150) solid">
                @else
                    <img src="{{ asset('img/user-profile-default.jpg') }}" alt="{{ auth()->user()->images }}" class="rounded rounded-circle mb-sm-1" width="30" style="border: 1px rgb(150, 150, 150) solid">
                @endif
                {{ Auth::user()->name }}
            </a>


            <div class="dropdown-menu dropdown-menu-end animate-menu slideIn-menu" aria-labelledby="navbarDropdown">

                {{-- Profile --}}
                <a href="{{ route('home') }}" class="d-block text-dark text-decoration-none fw-bold fs-6">
                    <div class="card m-2 pt-2">
                        <div class="justify-content-center d-flex mb-2">
                            <div class="image">
                                @if (auth()->user()->images)
                                    <img src="{{ asset('storage/images/' . auth()->user()->images) }}" class="img-circle elevation-2" alt="User Image" width="40" height="40">
                                @else
                                    <img src="{{ asset('img/user-profile-default.jpg') }}" class="img-circle elevation-2" alt="User Image" width="40" height="40">
                                @endif
                            </div>
                        </div>
                        <div class="info px-2">
                            <p class="text-center d-block text-dark text-decoration-none fw-bold fs-6">{{ Auth()->user()->name }}</p>
                        </div>
                    </div>
                </a>

                {{-- Halaman Utama --}}
                <a class="dropdown-item" href="{{ route('welcome') }}">
                    {{ __('Home') }}
                </a>

                <hr class="dropdown-divider">

                {{-- Edit Profile --}}
                <a class="dropdown-item" href="{{ route('dashboard.profile') }}">
                    {{ __('Edit Profile') }}
                </a>

                <hr class="dropdown-divider">

                {{-- Logout --}}
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </li>
        @endguest
    </ul>
</nav>