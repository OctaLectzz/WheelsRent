<form action="{{ route('mobil.edit', ['mobil' => $mobil->id]) }}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="modal fade" id="editMobilModal{{ $mobil->id }}" tabindex="-1" aria-labelledby="editMobilModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="editMobilModalLabel">Edit Master Mobil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <div class="form-group">
                        <label for="type_mobil">Type Mobil:</label>
                        <input type="text" class="form-control @error('type_mobil') is-invalid @enderror" id="type_mobil" value="{{ old('type_mobil', $mobil->type_mobil) }}" name="type_mobil" required>
                        @error('type_mobil')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="bensin">Bensin:</label>
                        <input type="text" class="form-control @error('bensin') is-invalid @enderror" id="bensin" value="{{ old('bensin', $mobil->bensin) }}" name="bensin" required>
                        @error('bensin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="jumlah">Jumlah:</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" value="{{ old('jumlah', $mobil->jumlah) }}" name="jumlah" required>
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
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