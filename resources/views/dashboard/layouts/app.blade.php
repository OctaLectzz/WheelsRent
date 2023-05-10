<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>WheelsRent</title>
        <link rel="shortcut icon" href="{{ asset('img/Logo.png') }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        {{-- Bootstrap Icons --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        {{-- My CSS --}}
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <link rel="stylesheet" href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">

        {{-- Admin LTE --}}
        <link rel="stylesheet" href="{{ asset('vendor/admin-lte/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        @stack('styles')

    </head>


    <body class="sidebar-mini layout-fixed">

        <div class="wrapper">

            {{-- Navbar --}}
            @include('dashboard.layouts.navbar')

            {{-- Sidebar --}}
            @include('dashboard.layouts.sidebar')

            {{-- Content --}}
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </section>
            </div>

        </div>


        @include('includes.modal-delete')

        
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/admin-lte/adminlte.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('js/delete.js') }}"></script>
        @stack('scripts')

    </body>


</html>