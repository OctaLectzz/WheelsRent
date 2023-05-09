@extends('dashboard.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col">


                <div class="card">
                    <div class="card-header">{{ __('Edit Profile') }}</div>
                    <div class="card-body">

                        <form action="" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            
                            {{-- Name --}}
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input
                                        id="name"
                                        type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="name"
                                        value="{{ old('name', $user->name) }}"
                                    >
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Tanggal Lahir --}}
                            <div class="row mb-3">
                                <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Lahir') }}</label>
                                <div class="col-md-6">
                                    <input
                                        id="tanggal_lahir"
                                        type="date"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}"
                                    >
                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Kelamin') }}</label>
                                <div class="col-md-6">
                                    <select
                                        class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                        aria-label="Default select example"
                                        name="jenis_kelamin"
                                    >
                                        <option
                                            {{ $user->jenis_kelamin === "Laki-Laki" ? 'selected' : '' }}
                                            value="Laki-Laki">Laki-Laki</option>
                                        <option
                                            {{ $user->jenis_kelamin === "Perempuan" ? 'selected' : '' }}
                                            value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Alamat --}}
                            <div class="row mb-3">
                                <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>
                                <div class="col-md-6">
                                    <textarea
                                        id="alamat"
                                        type="text"
                                        class="form-control @error('alamat') is-invalid @enderror"
                                        name="alamat"
                                    >{{ old('alamat', $user->alamat) }}</textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- images --}}
                            <div class="row mb-3">
                                <label for="images" class="col-md-4 col-form-label text-md-end">{{ __('Foto Profile') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="card p-2 mb-2 mx-3">
                                            @if ($user->images)
                                                <img id="profile" src="{{ asset('storage/images/' . $user->images) }}" class="img-circle elevation-2" width="50" height="50" style="border: 3px white solid">
                                            @else
                                                <img id="profile" src="{{ asset('vendor/admin-lte/img/user-profile-default.jpg') }}" class="img-circle elevation-2" alt="User Image" width="50" height="50" style="border: 3px white solid">
                                            @endif
                                        </div>
                                        <div class="mt-2">
                                            <input
                                                name="images"
                                                class="form-control @error('images') is-invalid @enderror"
                                                value="{{ old('images', auth()->user()->images) }}"
                                                type="file"
                                                id="formFile"
                                                accept="image/*"
                                                onchange="loadFile(event)"
                                            >
                                            <small for="formFile" class="form-label ms-4">
                                                Upload Your Profile Photo 
                                            </small>
                                        </div>
                                    </div>
                                    @error('images')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="row mb-3">
                                <label
                                    for="status"
                                    class="col-md-4 col-form-label text-md-end"
                                >{{ __('Status') }}</label>

                                <div class="col-md-6"> 
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group"> 
                                        <input type="radio" class="btn-check" name="status" id="status1" value="Active" {{ $user->status == 'Active' ? 'checked' : '' }} autocomplete="off"> 
                                        <label class="btn btn-outline-success me-2" for="status1">Active</label> 

                                        <input type="radio" class="btn-check" name="status" id="status2" 
                                        value="Blocked" {{ $user->status == 'Blocked' ? 'checked' : '' }} autocomplete="off"> 
                                        <label class="btn btn-outline-danger" for="status2">Blocked</label>
                                    </div> 
                                </div>
                            </div>

                            {{-- Save --}}
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>




    <script src="{{ asset('js/preview.js') }}"></script>
    <script src="{{ asset('js/submit.js') }}"></script>

@endsection
