<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
    <div class="container">
        
        {{-- Left of Navbar --}}
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" width="50" class="mb-1">
            WheelsRent
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
            {{-- Center of Navbar --}}
            <ul class="navbar-nav ms-4 mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/*') ? 'active bg-light bg-opacity-75 text-danger rounded-3 fw-bold' : '' }}" aria-current="page" href="/">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('mobil*') ? 'active bg-light bg-opacity-75 text-danger rounded-3 fw-bold' : '' }}" href="/mobil">MOBIL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('transaksi*') ? 'active bg-light bg-opacity-75 text-danger rounded-3 fw-bold' : '' }}" href="/transaksi">TRANSAKSI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">CONTACT</a>
                </li>
            </ul>

            {{-- Right of Navbar --}}
            <ul class="navbar-nav d-flex">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item ms-5">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li> 
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            @if (auth()->user()->images)
                                <img src="{{ asset('storage/images/' . auth()->user()->images) }}" alt="{{ auth()->user()->images }}" class="rounded rounded-circle me-1 shadow" width="30" style="border: 1px white solid">
                            @else
                                <img src="{{ asset('img/user-profile-default.jpg') }}" alt="{{ auth()->user()->images }}" class="rounded rounded-circle me-1 shadow" width="30" style="border: 1px white solid">
                            @endif
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark animate-menu slideIn-menu" aria-labelledby="navbarDropdown">
            
                            {{-- Profile --}}
                            <a href="{{ route('profile') }}" class="d-block text-dark text-decoration-none fw-bold fs-6">
                                <div class="card bg-dark m-2 pt-2">
                                    <div class="justify-content-center d-flex mb-2">
                                        <div class="image">
                                            @if (auth()->user()->images)
                                                <img src="{{ asset('storage/images/' . Auth::user()->images) }}" class="rounded rounded-circle" alt="User Image" width="40" height="40" style="border: 2px #e0e0e0 solid">
                                            @else
                                                <img src="{{ asset('img/user-profile-default.jpg') }}" class="rounded rounded-circle" alt="User Image" width="40" height="40" style="border: 3px #e0e0e0 solid">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="info px-2">
                                        <p class="text-center d-block text-white text-decoration-none fw-bold fs-6">{{ Auth()->user()->name }}</p>
                                    </div>
                                </div>
                            </a>

                            {{-- Dashboard --}}
                            <a class="dropdown-item" href="{{ route('home') }}">
                                {{ __('Dashboard') }}
                            </a>

                            <hr class="dropdown-divider">
            
                            {{-- Edit Profile --}}
                            <a class="dropdown-item" href="{{ route('profile') }}">
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

      </div>

    </div>
</nav>