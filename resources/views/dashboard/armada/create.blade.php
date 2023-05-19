<form method="POST" action="{{ route('armada.create') }}" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Armada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">

                    {{-- mobilImages --}}
                    <label for="mobilImages">{{ __('Foto Mobil :') }}</label>
                    <div class="input-group">
                        <div class="card p-2 mb-1 me-2">
                            <img id="mobil" src="{{ asset('img/Car.png') }}" class="img-circle elevation-2" alt="mobil image" width="50" height="50" style="border: 3px white solid">
                        </div>
                        <div class="mt-1">
                            <input
                                name="mobilImages"
                                class="form-control @error('mobilImages') is-invalid @enderror"
                                value="{{ old('mobilImages') }}"
                                type="file"
                                id="formFile"
                                accept="image/*"
                                onchange="loadFile(event)"
                            >
                        </div>
                    </div>
                    @error('mobilImages')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    {{-- Type Mobil --}}
                    <div class="form-group">
                        <label for="mobil">Mobil :</label>
                        <select class="form-control @error('mobil_id') is-invalid @enderror" name="mobil_id" id="mobil">
                            @forelse ($mobils as $mobil)
                                @if (old('mobil_id') == $mobil->id)
                                    <option value="{{ $mobil->id }}" selected>{{ $mobil->type_mobil }}</option>
                                @else
                                    <option value="{{ $mobil->id }}">{{ $mobil->type_mobil }}</option>
                                @endif
                            @empty
                                <span>Belum ada mobil, Silahkan tambah mobil terlebih dahulu!</span>
                            @endforelse
                        </select>
                        @error('mobil')
                            <span class="text-danger fs-6 fw-bold">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Plat Nomor --}}
                    <div class="form-group">
                        <label for="plat_nomor">Plat Nomor :</label>
                        <input type="text" class="form-control @error('plat_nomor') is-invalid @enderror" id="plat_nomor" name="plat_nomor" value="{{ old('plat_nomor') }}" required>
                        @error('plat_nomor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status  --}} 
                    <div class="form-group"> 
                        <label for="status" class="me-3">Status :</label> 
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group"> 
                            <input type="radio" class="btn-check" name="status" id="status1" value="0" {{ old('status') == 0 ? 'checked' : '' }} autocomplete="off"> 
                            <label class="btn btn-outline-success me-2" for="status1">Tersedia</label> 

                            <input type="radio" class="btn-check" name="status" id="status2" 
                            value="1" {{ old('status') == 1 ? 'checked' : '' }} autocomplete="off"> 
                            <label class="btn btn-outline-danger" for="status2">Disewa</label>
                        </div> 
                    </div>

                    {{-- Harga --}}
                    <div class="form-group">
                        <label for="harga">Harga :</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
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




{{-- Preview Image --}}
<script>
    let loadFile = function(event) {
        var images = document.getElementById('mobil');
        images.src = URL.createObjectURL(event.target.files[0]);
    }
</script>