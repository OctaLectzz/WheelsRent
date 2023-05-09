@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">

        {{-- Alert --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            
        {{-- Header --}}
        <div class="header">
        </div>

        <div class="card mb-3">
            
            {{-- Profile Edit --}}
            <div class="mt-2 d-flex justify-content-end btnn">
                <a href="#" class="btn btn-large btn-success rounded-5" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}"><i class="bi bi-pencil"></i></a>
            </div>
            @include('includes.modal-editprofile')

            {{-- Profile Photo --}}
            <div class="profile d-flex justify-content-center">
                @if (auth()->user()->images)
                    <img src="{{ asset('storage/images/' . $user->images) }}" class="rounded rounded-circle shadow" alt="User Image" width="200" height="200" style="border: 3px white solid">
                @else
                    <img src="{{ asset('img/user-profile-default.jpg') }}" class="rounded rounded-circle shadow" alt="User Image" width="200" height="200" style="border: 3px white solid">
                @endif
            </div>
            
            {{-- Profile Detail --}}
            <div class="card-text pb-3">
                <p class="fs-4 text-center card-text"><small class="text-muted">{{ $user->role }}</small></p>
                <h1 class="card-text text-center"><b>{{ $user->name }}</b></h1>
                <p class="card-text fs-2 text-center"><small class="text-muted">{{ $user->email }}</small></p>
                <p class="card-text fs-4 text-muted mt-5">{{ $user->tanggal_lahir }} | {{ $user->jenis_kelamin }}</p>
                <p class="card-text fs-3">{{ $user->alamat }}</p>
            </div>

        </div>
        
    </div>
</div>

@endsection
