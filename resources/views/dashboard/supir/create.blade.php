<form action="{{ route('supir.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Master Supir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
    
                    {{-- Nama --}}
                    <div class="form-group">
                        <label for="nama">{{ __('Nama :') }}</label>
                        <input
                            id="nama"
                            type="text"
                            class="form-control @error('nama') is-invalid @enderror"
                            name="nama"
                            value="{{ old('nama') }}"
                            autocomplete="off"
                            autofocus
                            required
                        >
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Alamat --}}
                    <div class="form-group">
                        <label for="alamat">{{ __('Alamat') }}</label>
                        <textarea 
                            class="form-control @error('alamat') is-invalid @enderror"
                            name="alamat"
                            id="floatingTextarea2 alamat" 
                            value="{{ old('alamat') }}"
                            placeholder="Leave a alamat here" 
                            style="height: 100px"
                            autocomplete="off"
                        ></textarea>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="form-group">
                        <label for="jenis_kelamin">{{ __('Jenis Kelamin') }}</label>
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

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Create</button>
                </div>

            </div>
        </div>
    </div>
</form>