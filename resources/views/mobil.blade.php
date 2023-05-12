@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        @forelse ($armadas as $armada)
            @if ($armada->status == 0)
                <div class="col-md-6">
                    <div class="card p-3 mb-3">
                        <img src="{{ asset('img/mobil.png') }}" alt="..." class="mb-3">
                        <div class="caption">
                            <h4 class="fw-bold mb-3">{{ $armada->mobil->type_mobil }}</h4>
                            <p class="my-0 fs-4">Nama Mobil : {{ $armada->mobil->type_mobil }}</p>
                            <p class="my-0 fs-4">Plat Nomor : {{ $armada->plat_nomor }}</p>
                            <p class="my-0 fs-4">Bensin : {{ $armada->mobil->bensin }}</p>
                            <p class="my-0 fs-4">Harga : Rp.{{ $armada->harga }} / Hari</p>
                            <p><a href="{{ route('transaksi.create', $armada->id) }}" class="btn btn-danger float-end" role="button">Pesan</a></p>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <h2 class="fw-bold">Mobil yang tersedia sudah habis atau belum tersedia.</h2>
        @endforelse

    </div>
</div>

@endsection
