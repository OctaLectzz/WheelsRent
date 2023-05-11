@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <h3 class="fw-bold mb-3">Semua Transaksi :</h3>
        
        <div class="table-responsive">
            <table class="table table-striped table-lg">

                <thead class=" table-dark">
                    <tr>
                        <th scope="col" class="text-center">No.</th>
                        <th scope="col">Mobil</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tipe Peminjaman</th>
                        <th scope="col">Supir</th>
                        <th scope="col">Lama Sewa</th>
                        <th scope="col">Tanggal Sewa</th>
                        <th scope="col">Harga</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($transaksis as $transaksi)
                        @if (auth()->check() && auth()->user()->name == $transaksi->nama)    
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $transaksi->armada->mobil->type_mobil }}</td>
                                <td>{{ $transaksi->nama }}</td>
                                <td>{{ $transaksi->tipe_peminjaman == 0 ? 'Tanpa Supir' : 'Dengan Supir' }}</td>
                                <td>{!! $transaksi->supir_id ? $transaksi->supir->nama : '<span class="ms-3">-</span>' !!}</td>
                                <td>{{ $transaksi->waktu }} Hari</td>
                                <td>{{ $transaksi->tanggal }}</td>
                                <td>{{ $transaksi->harga }}</td>
                                <td>{!! $transaksi->status == 0 ? '<div class="text-center"><p class="p-2 px-3 badge bg-secondary">Belum Bayar</p></div>' : ($transaksi->status == 1 ? '<div class="text-center"><p class="p-2 px-3 badge bg-warning">Pending</p></div>' : ($transaksi->status == 2 ? '<div class="text-center"><p class="p-2 px-3 badge bg-success">Selesai</p></div>' : '<div class="text-center"><p class="p-2 px-3 badge bg-danger">Dibatalkan</p></div>')) !!}</td>
                                <td>
                                    {{-- Bayar --}}
                                    <a href="#" class="btn btn-sm btn-success rounded mb-1 @if ($transaksi->status != 0) disabled @endif" data-bs-toggle="modal" data-bs-target="#editTransaksiModal{{ $transaksi->id }}">
                                        <i class="fa fa-money-bill-wave"></i>
                                    </a>
                                    @include('includes.modal-bayar', $transaksi)
                                    {{-- Cancel --}}
                                    <form action="{{ route('bayar.cancel', $transaksi) }}" method="POST" enctype="multipart/form-data" class="d-inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-danger rounded mb-1 @if ($transaksi->status != 0 && $transaksi->status != 1) disabled @endif"><i class="fa fa-ban"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">Anda belum melakukan transaksi apapun.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
        
    </div>
</div>

@endsection
