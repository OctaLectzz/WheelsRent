@extends('dashboard.layouts.app')

@section('content')

<div class="container">
    <h1>ADMIN DASHBOARD</h1>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="border-transaksi">
                <div class="row">
                    <div class="col-3 me-5">
                        <i class="fw-bold fa fa-shopping-cart p-5 rounded-4 bg-gradient-navy fs-1"></i>
                    </div>
                    <div class="col-7">
                        <p class="fs-2">Total Transaksi</p>
                        <p class="card-text fw-bold fs-3">{{ $transaksi->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border-pendapatan">
                <div class="row">
                    <div class="col-3 me-5">
                        <i class="fw-bold fa fa-money-bill-wave p-5 rounded-4 bg-success fs-1"></i>
                    </div>
                    <div class="col-7">
                        <p class="fs-2">Total Pendapataan</p>
                        <p class="card-text fw-bold fs-3">Rp.{{ $totalHarga }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border-mobil">
                <div class="row">
                    <div class="col-3 me-5">
                        <i class="fa fa-car p-5 rounded-4 bg-primary fs-1"></i>
                    </div>
                    <div class="col-7">
                        <p class="fs-2">Total Mobil</p>
                        <p class="card-text fw-bold fs-3">{{ $mobil }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border-customer">
                <div class="row">
                    <div class="col-3 me-5">
                        <i class="fw-bold fa fa-users p-5 rounded-4 bg-danger fs-1"></i>
                    </div>
                    <div class="col-7">
                        <p class="fs-2">Total Customer</p>
                        <p class="card-text fw-bold fs-3">{{ $user->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border-supir">
                <div class="row">
                    <div class="col-3 me-5">
                        <i class="fw-bold fa fa-id-card p-5 rounded-4 bg-warning fs-1"></i>
                    </div>
                    <div class="col-7">
                        <p class="fs-2">Total Supir</p>
                        <p class="card-text fw-bold fs-3">{{ $supir->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection
