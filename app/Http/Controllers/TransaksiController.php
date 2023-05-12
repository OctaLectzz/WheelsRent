<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Supir;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::latest()->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function mobil()
    {
        $armadas = Armada::all();
        return view('mobil', compact('armadas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, Supir $supir)
    {
        $armada = Armada::findOrFail($id);
        $supirs = Supir::all();
        return view('transaksi.bayar', compact(['armada', 'supirs']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $armadaId)
    {
        $armada = Armada::findOrFail($armadaId);
        
        // Validate Request //
        $data = $request->validate(
            [
                'tipe_peminjaman' => 'required|string',
                'waktu' => 'required|integer',
                'tanggal' => 'required',
                'harga' => 'required',
            ]
        );
        $data['armada_id'] = $armadaId;
        $data['supir_id'] = $request->supir_id;
        $data['nama'] = auth()->user()->name;

        $transaksi = Transaksi::create($data);

        $findArmada = Armada::find($armada->id);
        $findArmada->update([
            'status' => 1
        ]);

        return redirect('/transaksi')->with('success', 'Berhasil dipesan, Silahkan lakukan pembayaran!');
    }

    // Semua Transaksi
    public function semua()
    {
        return view('dashboard.transaksi.semua');
    }
    public function semualist()
    {
        return datatables()
            ->eloquent(Transaksi::query()->latest())
            ->editColumn('armada', function ($transaksi) {
                return $transaksi->armada->mobil->type_mobil;
            })
            ->editColumn('waktu', function ($transaksi) {
                return "$transaksi->waktu Hari";
            })
            ->editColumn('status', function ($transaksi) {
                return $transaksi->status == 0 ? '<div class="text-center"><p class="p-2 px-3 badge bg-secondary">Belum Bayar</p></div>'
                    : ($transaksi->status == 1 ? '<div class="text-center"><p class="p-2 px-3 badge bg-warning">Pending</p></div>' 
                    : ($transaksi->status == 2 ? '<div class="text-center"><p class="p-2 px-3 badge bg-success">Selesai</p></div>' 
                    : '<div class="text-center"><p class="p-2 px-3 badge bg-danger">Dibatalkan</p></div>'));
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }

    // Belum Bayar
    public function belumBayar()
    {
        return view('dashboard.transaksi.belumBayar');
    }
    public function belumBayarlist()
    {
        return datatables()
            ->eloquent(Transaksi::query()->where('status', 0)->latest())
            ->editColumn('armada', function ($transaksi) {
                return $transaksi->armada->mobil->type_mobil;
            })
            ->editColumn('waktu', function ($transaksi) {
                return "$transaksi->waktu Hari";
            })
            ->editColumn('status', function ($transaksi) {
                return $transaksi->status == 0 ? '<div class="text-center"><p class="p-2 px-3 badge bg-secondary">Belum Bayar</p></div>'
                    : ($transaksi->status == 1 ? '<div class="text-center"><p class="p-2 px-3 badge bg-warning">Pending</p></div>' 
                    : ($transaksi->status == 2 ? '<div class="text-center"><p class="p-2 px-3 badge bg-success">Selesai</p></div>' 
                    : '<div class="text-center"><p class="p-2 px-3 badge bg-danger">Dibatalkan</p></div>'));
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }

    // Proses
    public function proses()
    {
        return view('dashboard.transaksi.proses');
    }
    public function proseslist()
    {
        return datatables()
            ->eloquent(Transaksi::query()->where('status', 1)->latest())
            ->addColumn('action', function ($transaksi) {
                return '
                    <div class="d-flex">
                        <form action="' . route('bayar.setuju', $transaksi) . '" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="'. @csrf_token() .'" enctype="multipart/form-data">
                            <button class="btn btn-sm btn-success px-3 mr-2 mb-1">
                                <i class="fa fa-clipboard-check"></i>
                            </button>
                        </form>
                        <form action="' . route('bayar.cancel', $transaksi) . '" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="'. @csrf_token() .'" enctype="multipart/form-data">
                            <button class="btn btn-sm btn-danger mr-2 mb-1">
                                <i class="fa fa-ban"></i>
                            </button>
                        </form>
                    </div>
                ';
            })
            ->editColumn('armada', function ($transaksi) {
                return $transaksi->armada->mobil->type_mobil;
            })
            ->editColumn('waktu', function ($transaksi) {
                return "$transaksi->waktu Hari";
            })
            ->editColumn('status', function ($transaksi) {
                return $transaksi->status == 0 ? '<div class="text-center"><p class="p-2 px-3 badge bg-secondary">Belum Bayar</p></div>'
                    : ($transaksi->status == 1 ? '<div class="text-center"><p class="p-2 px-3 badge bg-warning">Pending</p></div>' 
                    : ($transaksi->status == 2 ? '<div class="text-center"><p class="p-2 px-3 badge bg-success">Selesai</p></div>' 
                    : '<div class="text-center"><p class="p-2 px-3 badge bg-danger">Dibatalkan</p></div>'));
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }

    // Selesai
    public function selesai()
    {
        return view('dashboard.transaksi.selesai');
    }
    public function selesailist()
    {
        return datatables()
            ->eloquent(Transaksi::query()->where('status', 2)->latest())
            ->editColumn('armada', function ($transaksi) {
                return $transaksi->armada->mobil->type_mobil;
            })
            ->editColumn('waktu', function ($transaksi) {
                return "$transaksi->waktu Hari";
            })
            ->editColumn('status', function ($transaksi) {
                return $transaksi->status == 0 ? '<div class="text-center"><p class="p-2 px-3 badge bg-secondary">Belum Bayar</p></div>'
                    : ($transaksi->status == 1 ? '<div class="text-center"><p class="p-2 px-3 badge bg-warning">Pending</p></div>' 
                    : ($transaksi->status == 2 ? '<div class="text-center"><p class="p-2 px-3 badge bg-success">Selesai</p></div>' 
                    : '<div class="text-center"><p class="p-2 px-3 badge bg-danger">Dibatalkan</p></div>'));
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }

    // Batal
    public function batal()
    {
        return view('dashboard.transaksi.batal');
    }
    public function batallist()
    {
        return datatables()
            ->eloquent(Transaksi::query()->where('status', 3)->latest())
            ->editColumn('armada', function ($transaksi) {
                return $transaksi->armada->mobil->type_mobil;
            })
            ->editColumn('waktu', function ($transaksi) {
                return "$transaksi->waktu Hari";
            })
            ->editColumn('status', function ($transaksi) {
                return $transaksi->status == 0 ? '<div class="text-center"><p class="p-2 px-3 badge bg-secondary">Belum Bayar</p></div>'
                    : ($transaksi->status == 1 ? '<div class="text-center"><p class="p-2 px-3 badge bg-warning">Pending</p></div>' 
                    : ($transaksi->status == 2 ? '<div class="text-center"><p class="p-2 px-3 badge bg-success">Selesai</p></div>' 
                    : '<div class="text-center"><p class="p-2 px-3 badge bg-danger">Dibatalkan</p></div>'));
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }
}
