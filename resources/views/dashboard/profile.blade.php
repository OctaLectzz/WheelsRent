@extends('dashboard.layouts.app')

@section('content')

<div class="container">
    <div class="row">

        {{-- Header --}}
        <div class="header">
        </div>

        <div class="card mb-3">
            {{-- Profile Edit --}}
            <div class="position-absolute mt-3 ms-3">
                <a href="#" class="btn btn-large btn-success rounded-5" data-bs-toggle="modal" data-bs-target="#editModal{{ auth()->user()->id }}"><i class="bi bi-pencil"></i></a>
            </div>
            @include('includes.modal-editprofile')

            {{-- Profile Photo --}}
            <div class="profile d-flex justify-content-center">
                @if (auth()->user()->images)
                    <img src="{{ asset('storage/images/' . auth()->user()->images) }}" class="img-circle elevation-2" alt="User Image" width="200" height="200" style="border: 5px white solid">
                @else
                    <img src="{{ asset('img/user-profile-default.jpg') }}" class="img-circle elevation-2" alt="User Image" width="200" height="200" style="border: 5px white solid">
                @endif
            </div>
            
            {{-- Profile Detail --}}
            <div class="card-text pb-3">
                <h1 class="card-text text-center"><b>{{ Auth::user()->name }}</b></h1>
                <p class="card-text fs-2 text-center"><small class="text-muted">{{ Auth::user()->email }}</small></p>
                <p class="card-text fs-4 text-muted mt-5">{{ Auth::user()->tanggal_lahir }} | {{ Auth::user()->jenis_kelamin }}</p>
                <p class="card-text fs-3">{{ Auth::user()->alamat }}</p>
            </div>
        </div>
        
    </div>
</div>

@endsection
