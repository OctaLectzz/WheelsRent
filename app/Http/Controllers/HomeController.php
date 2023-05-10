<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Supir;
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
        $mobil = Mobil::all();
        $supir = Supir::all();
        return view('dashboard.home', compact(['mobil', 'supir']));
    }
}
