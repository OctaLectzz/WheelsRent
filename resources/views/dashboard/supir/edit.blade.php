<form action="{{ route('supir.edit', ['supir' => $supir->id]) }}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="modal fade" id="editSupirModal{{ $supir->id }}" tabindex="-1" aria-labelledby="editSupirModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="editSupirModalLabel">Edit Master Supir</h5>
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
                            value="{{ old('nama', $supir->nama) }}"
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
                            class="form-control @error('alamat', $supir->alamat) is-invalid @enderror"
                            name="alamat"
                            id="floatingTextarea2 alamat" 
                            value="{{ old('alamat') }}"
                            placeholder="Leave a alamat here" 
                            style="height: 100px"
                            autocomplete="off"
                        >{{ $supir->alamat }}</textarea>
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
                            <option value="Laki-Laki" @if ($supir->jenis_kelamin == 'Laki-laki') selected @endif>Laki-Laki</option>
                            <option value="Perempuan" @if ($supir->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
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
                    <button type="submit" class="btn btn-dark">Change</button>
                </div>
            </div>
        </div>
    </div>
</form>