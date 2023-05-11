<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class BayarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $transaksiId)
    {
        $transaksi = Transaksi::findOrFail($transaksiId);

        // Validate Request //
        $data = $request->validate(
            [
                'bukti_transfer' => 'required|image|file|max:2048'
            ]);
            $data['transaksi_id'] = $request->transaksi_id;

        
        // Request bukti_transfer //
        $newbuktiTransfer = $request->bukti_transfer->getClientOriginalName();
        $request->bukti_transfer->storeAs('bukti_transfer', $newbuktiTransfer);
        $data['bukti_transfer'] = $newbuktiTransfer;

        $bayar = Bayar::create($data);

        $findTransaksi = Transaksi::find($transaksi->id);
        $findTransaksi->update([
            'status' => 1
        ]);

        return redirect('/transaksi')->with('success', 'Sukses Membayar Mobil');
    }

    public function cancel(Transaksi $transaksi)
    {
        $data['status'] = 3;

        $findTransaksi = Transaksi::find($transaksi->id);
        $findTransaksi->update($data);

        return redirect()->back()->with('success', 'Berhasil Membatalkan Pesanan');
    }

    public function setuju(Transaksi $transaksi)
    {
        $data['status'] = 2;

        $findTransaksi = Transaksi::find($transaksi->id);
        $findTransaksi->update($data);

        return redirect()->back()->with('success', 'Berhasil Menyetujui Pesanan');
    }
}
