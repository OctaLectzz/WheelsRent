<div class="modal fade" id="editModal{{ auth()->user()->id }}" tabindex="-1" aria-labelledby="editModal{{ auth()->user()->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="{{ route('profile.update', auth()->user()->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="modal-header">
            <h5 class="modal-title" id="editModal{{ auth()->user()->id }}Label">Edit Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

            {{-- Images --}}
            <div class="row mb-3">
                <label for="images" class="col-md-4 col-form-label text-md-end">{{ __('Foto Profile') }}</label>
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="card p-2 mb-2 mx-3">
                            @if (auth()->user()->images)
                                <img id="profile" src="{{ asset('storage/images/' . auth()->user()->images) }}" class="img-circle elevation-2" width="50" height="50" style="border: 3px white solid">
                            @else
                                <img id="profile" src="{{ asset('img/user-profile-default.jpg') }}" class="img-circle elevation-2" alt="User Image" width="50" height="50" style="border: 3px white solid">
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
                            <small for="formFile" class="form-label">
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

            {{-- Name --}}
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                <div class="col-md-6">
                    <input
                        id="name"
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        name="name"
                        value="{{ auth()->user()->name }}"
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
                        value="{{ auth()->user()->tanggal_lahir }}"
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
                            {{ auth()->user()->jenis_kelamin === "Laki-Laki" ? 'selected' : '' }}
                            value="Laki-Laki">Laki-Laki</option>
                        <option
                            {{ auth()->user()->jenis_kelamin === "Perempuan" ? 'selected' : '' }}
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
                    >{{ auth()->user()->alamat }}</textarea>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-dark">Save Changes</button>
          </div>

        </form>
      </div>
    </div>
</div>




{{-- Preview Image --}}
<script>
    let loadFile = function(event) {
        var images = document.getElementById('profile');
        images.src = URL.createObjectURL(event.target.files[0]);
    }
</script>