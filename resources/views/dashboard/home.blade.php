@extends('dashboard.layouts.app')

@section('content')

<div class="container mt-4">
    <h1>Admin Dashboard</h1>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow rounded-3 p-3 py-4">
                <div class="row">
                    <div class="col-3 me-3">
                        <i class="fa fa-car p-5 rounded bg-primary fs-1"></i>
                    </div>
                    <div class="col-5">
                        <p class="fs-2">Total Mobil</p>
                        <p class="card-text fw-bold fs-3">{{ $mobil->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow rounded-3 p-3 py-4">
                <div class="row">
                    <div class="col-3 me-3">
                        <i class="fw-bold fa fa-users p-5 rounded bg-danger fs-1"></i>
                    </div>
                    <div class="col-5">
                        <p class="fs-2">Total Pelanggan</p>
                        <p class="card-text fw-bold fs-3">4</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow rounded-3 p-3 py-4">
                <div class="row">
                    <div class="col-3 me-3">
                        <i class="fw-bold fa fa-id-card p-5 rounded bg-success fs-1"></i>
                    </div>
                    <div class="col-5">
                        <p class="fs-2">Total Supir</p>
                        <p class="card-text fw-bold fs-3">{{ $supir->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection
