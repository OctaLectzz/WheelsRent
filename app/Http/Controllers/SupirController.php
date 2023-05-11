<?php

namespace App\Http\Controllers;

use App\Models\Supir;
use Illuminate\Http\Request;

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
                            <a href="#" class="btn btn-sm btn-warning rounded mb-1" data-bs-toggle="modal" data-bs-target="#editSupirModal'. $supir->id. '"><i class="fa fa-edit"></i></a>
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
    public function index(Supir $supir)
    {
        $supirs = Supir::all();
        return view('dashboard.supir.index', compact('supirs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supir $supir)
    {
        // Validate Request //
        $data = $request->validate(
            [
                'nama' => 'required|string',
                'alamat' => 'string',
                'jenis_kelamin' => 'string',
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
