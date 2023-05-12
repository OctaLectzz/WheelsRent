<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{

    public function list()
    {
        return datatables()
            ->eloquent(Mobil::query()->latest())
            ->addColumn('action', function ($mobil) {
                return '
                    <div class="d-flex">
                        <form onsubmit="destroy(event)" action="' . route('mobil.destroy', $mobil->id) . '" method="POST">
                            <input type="hidden" name="_token" value="'. @csrf_token() .'" enctype="multipart/form-data">
                            <a href="#" class="btn btn-sm btn-warning rounded mb-1" data-bs-toggle="modal" data-bs-target="#editMobilModal'. $mobil->id. '"><i class="fa fa-edit"></i></a>
                            <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm btn-danger mr-2 mb-1">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </form>
                    </div>
                ';
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
        return view('dashboard.mobil.index', compact('mobils'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Request //
        $data = $request->validate(
            [
                'type_mobil' => 'required|string',
                'plat_nomor' => 'required|string',
                'bensin' => 'required|string',
                'jumlah' => 'required'
            ]
        );

        $mobil = Mobil::create($data);

        return redirect('/dashboard/mobil')->with('success', 'Berhasil Menambah Mobil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobil $mobil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobil $mobil)
    {
        // Validate Request //
        $data = $request->validate(
            [
                'type_mobil' => 'required|string',
                'plat_nomor' => 'required|string',
                'bensin' => 'required|string',
                'jumlah' => 'required'
            ]
        );

        $findMobil = Mobil::find($mobil->id);
        $findMobil->update($data);

        return redirect('/dashboard/mobil')->with('success', 'Berhasil Mengedit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        $mobil->delete();

        return response()->json(['success' => 'Mobil Berhasil Dihapus']);
    }
}
