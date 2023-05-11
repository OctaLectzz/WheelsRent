@extends('layouts.app')

@section('content')

<!-- Jumbotron -->
<section id="jumbotron" class="bg-dark bg-opacity-25">
    <center class="bg-dark bg-opacity-50 p-4 rounded-4">			
        <h1>Selamat datang di <img src="{{ asset('img/logo.png') }}" alt="Logo" width="100" class="mb-1"> WheelsRent</h1>
        <p class="fs-5">Tempat Rental Mobil terbaik dan terlengkap di muka bumi..</p><br/><br/>
        @guest
            <p><a class="btn btn-danger btn-lg" href="/register" role="button">Get Started !</a></p>
        @endguest
        @auth
            <p><a class="btn btn-danger btn-lg" href="/mobil" role="button">Lihat Daftar Mobil</a></p>
        @endauth
    </center>
</section>
<!-- Jumbotron -->

<div class="container">	

    <!-- Daftar Mobil -->
    <section id="daftarMobil">
        <a href="/mobil" class="float-end mt-1 me-3 fs-5 text-decoration-none">Lihat Semua</a>
        <h2 class="mt-4">Daftar Mobil</h2>
        <hr>
    
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card p-3">
                    <img src="{{ asset('img/Car.png') }}" alt="..." class="mb-3">
                    <div class="caption">
                        <h4 class="fw-bold mb-3">Avansa</h4>
                        <p class="my-0">Nama Mobil : Avansa</p>
                        <p class="my-0">Plat Nomor : AD 3434 BG</p>
                        <p class="my-0">Bensin : Pertamax</p>
                        <p><a href="#" class="btn btn-danger float-end" role="button">Pesan</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card p-3">
                    <img src="{{ asset('img/Car.png') }}" alt="..." class="mb-3">
                    <div class="caption">
                        <h4 class="fw-bold mb-3">Avansa</h4>
                        <p class="my-0">Nama Mobil : Avansa</p>
                        <p class="my-0">Plat Nomor : AD 3434 BG</p>
                        <p class="my-0">Bensin : Pertamax</p>
                        <p><a href="#" class="btn btn-danger float-end" role="button">Pesan</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card p-3">
                    <img src="{{ asset('img/Car.png') }}" alt="..." class="mb-3">
                    <div class="caption">
                        <h4 class="fw-bold mb-3">Avansa</h4>
                        <p class="my-0">Nama Mobil : Avansa</p>
                        <p class="my-0">Plat Nomor : AD 3434 BG</p>
                        <p class="my-0">Bensin : Pertamax</p>
                        <p><a href="#" class="btn btn-danger float-end" role="button">Pesan</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card p-3">
                    <img src="{{ asset('img/Car.png') }}" alt="..." class="mb-3">
                    <div class="caption">
                        <h4 class="fw-bold mb-3">Avansa</h4>
                        <p class="my-0">Nama Mobil : Avansa</p>
                        <p class="my-0">Plat Nomor : AD 3434 BG</p>
                        <p class="my-0">Bensin : Pertamax</p>
                        <p><a href="#" class="btn btn-danger float-end" role="button">Pesan</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Daftar Mobil -->

    <h2 class="mt-4">About WheelsRent</h2>
    <hr>

</div>

<!-- About WheelsRent -->
@include('includes.about-wheelsrent')
<!-- About WheelsRent -->

<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->

@endsection
