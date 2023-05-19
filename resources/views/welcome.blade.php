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
            @php
                $count = 0;
            @endphp

            @forelse ($armadas as $armada)
                @if ($armada->status == 0)
                    @if ($count < 4)
                        <div class="col-sm-6 col-md-3">
                            <div class="card p-3">
                                @if ($armada->mobilImages)
                                    <img src="{{ asset('storage/mobilImages/' . $armada->mobilImages) }}" alt="Mobil" class="mb-3">
                                @else
                                    <img src="{{ asset('img/mobil.png') }}" alt="Mobil" class="mb-3">
                                @endif
                                <div class="caption">
                                    <h4 class="fw-bold mb-3">{{ $armada->mobil->type_mobil }}</h4>
                                    <p class="my-0">Nama Mobil : {{ $armada->mobil->type_mobil }}</p>
                                    <p class="my-0">Plat Nomor : {{ $armada->plat_nomor }}</p>
                                    <p class="my-0">Bensin : {{ $armada->mobil->bensin }}</p>
                                    <p class="my-0">Harga : Rp.{{ $armada->harga }} / Hari</p>
                                    <p><a href="{{ route('transaksi.create', $armada->id) }}" class="btn btn-danger float-end" role="button">Pesan</a></p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @php
                        $count++;
                    @endphp
                @endif
            @empty
                <h2 class="fw-bold">Mobil yang tersedia sudah habis atau belum tersedia.</h2>
            @endforelse

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
