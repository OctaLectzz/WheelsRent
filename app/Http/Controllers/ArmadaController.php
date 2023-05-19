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
            ->addColumn('action', function ($armada) {
                return '
                    <div class="d-flex">
                        <form onsubmit="destroy(event)" action="' . route('armada.destroy', $armada->id) . '" method="POST">
                            <input type="hidden" name="_token" value="'. @csrf_token() .'" enctype="multipart/form-data">
                            <a href="#" class="btn btn-sm btn-warning rounded mb-1" data-bs-toggle="modal" data-bs-target="#editCustomerModal'. $armada->id. '"><i class="fa fa-edit"></i></a>
                            <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm btn-danger mr-2 mb-1">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </form>
                    </div>
                ';
            })
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
        $armadas = Armada::all();
        return view('dashboard.armada.index', compact(['mobils', 'armadas']));
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
                'status' => 'required',
                'harga' => 'required'
            ]
        );

        // Request mobilImages //
        if ($request->hasFile('mobilImages')) {
            $newImage = $request->mobilImages->getClientOriginalName();
            $request->mobilImages->storeAs('public/mobilImages', $newImage);
            $data['mobilImages'] = $newImage;
        }

        $armada = Armada::create($data);

        return redirect('/dashboard/armada')->with('success', 'Berhasil Menambah Mobil!');
    }

    public function update(Request $request, Armada $armada)
    {
        // Validate Request //
        $data = $request->validate(
            [
                'mobil_id' => 'required|string',
                'plat_nomor' => 'required|string',
                'status' => 'required',
                'harga' => 'required'
            ]
        );

        if ($request->hasFile('mobilImages')) {
            $newImage = $request->mobilImages->getClientOriginalName();
            $request->mobilImages->storeAs('public/mobilImages', $newImage);
            $data['mobilImages'] = $newImage;
        }

        $findArmada = Armada::find($armada->id);
        $findArmada->update($data);

        return redirect('/dashboard/armada')->with('success', 'Armada Updated Successfully!');
    }

    public function destroy(Armada $armada)
    {
        $armada->delete();

        return response()->json(['success' => 'Armada has been Deleted!']);
    }
}
