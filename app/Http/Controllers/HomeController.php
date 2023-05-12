<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Supir;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        $mobil = Mobil::sum('jumlah');
        $supir = Supir::all();
        $transaksi = Transaksi::all();
        $totalHarga = Transaksi::sum('harga');
        return view('dashboard.home', compact(['user', 'mobil', 'supir', 'transaksi', 'totalHarga']));
    }
}
