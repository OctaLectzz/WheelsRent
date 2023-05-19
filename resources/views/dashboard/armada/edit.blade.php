<form action="{{ route('armada.edit', ['armada' => $armada->id]) }}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="modal fade" id="editCustomerModal{{ $armada->id }}" tabindex="-1" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    {{-- mobilImages --}}
                    <label for="mobilImages">{{ __('Foto Mobil') }}</label>
                    <div class="input-group">
                        <div class="card p-2 mb-1 me-2">
                            @if ($armada->mobilImages)
                                <img id="mobil{{ $armada->id }}" src="{{ asset('storage/mobilImages/' . $armada->mobilImages) }}" class="img-circle elevation-2" width="50" height="50" style="border: 3px white solid">
                            @else
                                <img id="mobil{{ $armada->id }}" src="{{ asset('img/Car.png') }}" class="img-circle elevation-2" alt="mobil image" width="50" height="50" style="border: 3px white solid">
                            @endif
                        </div>
                        <div class="mt-1">
                            <input
                                name="mobilImages"
                                class="form-control @error('mobilImages') is-invalid @enderror"
                                value="{{ old('mobilImages', $armada->mobilImages) }}"
                                type="file"
                                id="file{{ $armada->id }}"
                                accept="image/*"
                                onchange="loadFile{{ $armada->id }}(event, {{ $armada->id }})"
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
                                <option value="{{ $mobil->id }}" {{ $armada->mobil_id == $mobil->id ? 'selected' : '' }}>{{ $mobil->type_mobil }}</option>
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
                        <label for="plat_nomor">Plat Nomor:</label>
                        <input type="text" class="form-control @error('plat_nomor') is-invalid @enderror" id="plat_nomor" name="plat_nomor" value="{{ old('plat_nomor', $armada->plat_nomor) }}" required>
                        @error('plat_nomor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    {{-- Harga --}}
                    <div class="form-group">
                        <label for="harga">Harga :</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $armada->harga) }}" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status  --}} 
                    <div class="form-group"> 
                        <label for="status" class="me-3">Status :</label> 
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group"> 
                            <input type="radio" class="btn-check" name="status" id="status1{{ $armada->id }}" value="0" {{ $armada->status == 0 ? 'checked' : '' }} autocomplete="off"> 
                            <label class="btn btn-outline-success me-2" for="status1{{ $armada->id }}">Tersedia</label> 

                            <input type="radio" class="btn-check" name="status" id="status2{{ $armada->id }}" 
                            value="1" {{ $armada->status == 1 ? 'checked' : '' }} autocomplete="off"> 
                            <label class="btn btn-outline-danger" for="status2{{ $armada->id }}">Disewa</label>
                        </div> 
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




{{-- Preview Image --}}
<script>
    let loadFile{{ $armada->id }} = function(event, armadaId) {
        var mobilImages = document.getElementById('mobil' + armadaId);
        mobilImages.src = URL.createObjectURL(event.target.files[0]);
    }
</script>