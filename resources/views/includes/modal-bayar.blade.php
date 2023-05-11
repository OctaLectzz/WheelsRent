<div class="modal fade" id="editTransaksiModal{{ $transaksi->id }}" tabindex="-1" aria-labelledby="editTransaksiModal{{ $transaksi->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('bayar.store', [$transaksiId = $transaksi->id]) }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="modal-header">
            <h5 class="modal-title" id="editTransaksiModal{{ $transaksi->id }}Label">Pembayaran</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

            {{-- Transfer --}}
            <div class="row mb-5 justify-content-center">
              <p class="col-md-12 col-md-4 fw-bold fs-4 text-center">Transfer Kesini :</p>
              <div class="d-flex justify-content-center">
                <img src="{{ asset('img/QR.jpg') }}" alt="Transfer" width="150">
              </div>
            </div>

            {{-- Jumlah yang harus ditransfer --}}
            <div class="row mb-3">
              <label for="jumlah-harga" class="col-md-4 col-form-label text-md-end">Harga yang harus dibayar</label>
              <div class="col-md-6">
                <div class="input-group mt-3">
                  <input type="text" class="form-control" value="{{ $transaksi->harga }}" id="jumlah-harga" disabled>
                </div>
              </div>
            </div>

            {{-- Transaksi ID --}}
            <input
              name="transaksi_id"
              value="{{ $transaksi->id }}"
              type="hidden"
              id="transaksi_id"
            >

            {{-- Bukti Transfer --}}
            <div class="row mb-3">
              <label for="bukti_transfer" class="col-md-4 col-form-label text-md-end">Bukti Transfer</label>
              <div class="col-md-6">
                <div class="input-group">
                  <div class="mb-2">
                    <input
                      name="bukti_transfer"
                      class="form-control @error('bukti_transfer') is-invalid @enderror"
                      value="{{ old('bukti_transfer') }}"
                      type="file"
                      accept="bukti_transfer/*"
                      id="formFile"
                      onchange="loadFile(event, {{ $transaksi->id }})"
                    >
                  </div>
              
                  <div class="card p-2 mx-3">
                    <img id="image{{ $transaksi->id }}" src="https://mustakim.org/wp-content/uploads/2023/05/Cara-Cek-Bukti-Transfer-BCA-Asli-atau-Palsu-Secara-Akurat.png" class="img-thumbnail" width="150">
                  </div>
                </div>
                @error('bukti_transfer')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-dark">Bayar</button>
          </div>

        </form>
      </div>
    </div>
</div>


<script>
  function loadFile(event, transaksiId) {
    var image = document.getElementById('image' + transaksiId);
    image.src = URL.createObjectURL(event.target.files[0]);
  }
</script>