<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Http\Requests\StoreMobilRequest;
use App\Http\Requests\UpdateMobilRequest;

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
                            <a href="' . route('mobil.edit', $mobil->id) . '" class="btn btn-sm btn-warning rounded mb-1"><i class="fa fa-edit"></i></a>
                            <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm btn-danger mr-2 mb-1">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </form>
                    </div>
                ';
            })
            ->editColumn('status', function ($mobil) {
                return $mobil->status == 0
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
        return view('dashboard.mobil.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMobilRequest $request)
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
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMobilRequest $request, Mobil $mobil)
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
