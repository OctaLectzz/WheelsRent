<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Mobil;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{

    public function list()
    {
        return datatables()
            ->eloquent(Armada::query()->latest())
            ->editColumn('mobil_id', function ($armada) {
                return $armada->mobil->type_mobil;
            })
            ->editColumn('status', function ($armada) {
                return $armada->status == 0
                ? '<div class="text-center"><p class="p-2 px-3 fs-6 badge badge-success">Tersedia</p></div>' 
                : '<div class="text-center"><p class="p-2 px-3 badge badge-danger">Disewa</p></div>' ;
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobils = Mobil::all();
        return view('dashboard.armada.index', compact('mobils'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Request //
        $data = $request->validate(
            [
                'mobil_id' => 'required|string',
                'plat_nomor' => 'required|string',
                'status' => 'required'
            ]
        );

        $armada = Armada::create($data);

        return redirect('/dashboard/armada')->with('success', 'Berhasil Menambah Mobil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Armada $armada)
    {
        //
    }
}
