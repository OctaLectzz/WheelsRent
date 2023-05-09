<?php

namespace App\Http\Controllers;

use App\Models\Supir;
use App\Http\Requests\StoreSupirRequest;
use App\Http\Requests\UpdateSupirRequest;

class SupirController extends Controller
{

    public function list()
    {
        return datatables()
            ->eloquent(Supir::query()->latest())
            ->addColumn('action', function ($supir) {
                return '
                    <div class="d-flex">
                        <form onsubmit="destroy(event)" action="' . route('supir.destroy', $supir->id) . '" method="POST">
                            <input type="hidden" name="_token" value="'. @csrf_token() .'" enctype="multipart/form-data">
                            <a href="' . route('supir.edit', $supir->id) . '" class="btn btn-sm btn-warning rounded mb-1"><i class="fa fa-edit"></i></a>
                            <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm btn-danger mr-2 mb-1">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </form>
                    </div>
                ';
            })
            ->editColumn('status', function ($supir) {
                return $supir->status == 'Tersedia'
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
        return view('dashboard.supir.index');
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
    public function store(StoreSupirRequest $request)
    {
        // Validate Request //
        $data = $request->validate(
            [
                'nama' => 'required|string',
                'alamat' => 'string',
                'jenis_kelamin' => 'string',
            ]
        );

        $supir = Supir::create($data);

        return redirect('/dashboard/supir')->with('success', 'Berhasil Menambah Supir!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supir $supir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supir $supir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupirRequest $request, Supir $supir)
    {
        // Validate Request //
        $data = $request->validate(
            [
                'type_Supir' => 'required|string',
                'plat_nomor' => 'required|string',
                'bensin' => 'required|string',
                'jumlah' => 'required',
                'status' => 'required'
            ]
        );

        $findSupir = Supir::find($supir->id);
        $findSupir->update($data);

        return redirect('/dashboard/supir')->with('success', 'Berhasil Mengedit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supir $supir)
    {
        $supir->delete();

        return response()->json(['success' => 'Supir Berhasil Dihapus']);
    }
}
