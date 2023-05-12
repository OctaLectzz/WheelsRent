@extends('layouts.app')


@section('content')

<div class="transaksi">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-3">
                <div class="card p-2 mb-3">
                    <div class="card-header fs-4 fw-bold">Informasi Mobil</div>
                    <div class="card-body">
                        <span class="float-end fw-bold">{{ $armada->mobil->type_mobil }}</span><p class="my-0 fs-5">Nama Mobil</p>
                        <span class="float-end fw-bold">{{ $armada->plat_nomor }}</span><p class="my-0 fs-5">Plat Nomor</p>
                        <span class="float-end fw-bold">{{ $armada->mobil->bensin }}</span><p class="my-0 fs-5">Bensin</p>
                        <span class="float-end fw-bold">Rp.{{ $armada->harga }} / Hari</span><p class="my-0 fs-5">Harga</p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card p-3">
                    <form action="{{ route('transaksi.store', $armada->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                {{-- Nama --}}
                                <div class="form-group">
                                    <label for="nama">Nama :</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ auth()->user()->name }}" required readonly>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                {{-- Lama Sewa --}}
                                <div class="form-group">
                                    <label for="waktu">Lama Sewa :</label>
                                    <input type="number" class="form-control @error('waktu') is-invalid @enderror" id="waktu" name="waktu" value="{{ old('waktu') }}" required>
                                    @error('waktu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- Tipe Peminjaman --}}
                                <div class="form-group">
                                    <label for="tipe_peminjaman">Tipe Peminjaman</label>
                                    <select class="form-control" id="tipe_peminjaman" name="tipe_peminjaman">
                                        <option value="0">Tanpa Supir</option>
                                        <option value="1">Dengan Supir</option>
                                    </select>
                                    @error('tipe_peminjaman')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                {{-- Tanggal Sewa --}}
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Sewa :</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Harga --}}
                        <div class="form-group">
                            <label for="harga">Harga :</label>
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ $armada->harga }}" required readonly>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        {{-- Supir --}}
                        <div class="form-group" id="supir-form" style="display: none;">
                            <label for="supir">Supir :</label>
                            <select class="form-control @error('supir_id') is-invalid @enderror" name="supir_id" id="supir">
                                <option value="">-- Pilih Supir --</option>
                                @forelse ($supirs as $supir)
                                    @if ($supir->status == 'Tersedia')
                                        @if (old('supir_id') == $supir->id)
                                            <option value="{{ $supir->id }}" selected>{{ $supir->nama }}</option>
                                        @else
                                            <option value="{{ $supir->id }}">{{ $supir->nama }}</option>
                                        @endif
                                    @endif
                                @empty
                                    <span>Supir sedang tidak ada!</span>
                                @endforelse
                            </select>
                            @error('supir_id')
                                <span class="text-danger fs-6 fw-bold">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-dark mt-3">Bayar</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


@push('scripts')
    <script>
        var tipePeminjamanSelect = document.getElementById('tipe_peminjaman');
        var supirForm = document.getElementById('supir-form');

        tipePeminjamanSelect.addEventListener('change', function() {
            if (this.value == 1) {
                supirForm.style.display = 'block';
            } else {
                supirForm.style.display = 'none';
            }
        });
    </script>

    <script>
        // Mendapatkan elemen-elemen yang diperlukan
        var hargaInput = document.getElementById('harga');
        var waktuInput = document.getElementById('waktu');
        var tipePeminjamanSelect = document.getElementById('tipe_peminjaman');

        // Mengatur harga default
        hargaInput.value = {{ $armada->harga }};

        // Fungsi untuk menghitung harga berdasarkan waktu dan tipe peminjaman
        function hitungHarga() {
            var hargaDefault = {{ $armada->harga }};
            var waktu = parseInt(waktuInput.value);
            var tipePeminjaman = parseInt(tipePeminjamanSelect.value);
            var hargaTotal = hargaDefault * waktu;

            // Menambahkan harga jika tipe peminjaman adalah "Dengan Supir"
            if (tipePeminjaman === 1) {
                hargaTotal += 200000;
            }

            // Mengupdate nilai input harga
            hargaInput.value = hargaTotal;
        }

        // Memanggil fungsi hitungHarga() setiap kali nilai input waktu atau tipe peminjaman berubah
        waktuInput.addEventListener('input', hitungHarga);
        tipePeminjamanSelect.addEventListener('change', hitungHarga);
    </script>
@endpush

@endsection