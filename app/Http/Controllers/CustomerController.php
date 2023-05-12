<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
    {
        return datatables()
            ->eloquent(User::query()->where('role', '!=', 'superAdmin')->latest())
            ->addColumn('action', function ($user) {
                return '
                    <div class="d-flex">
                        <form onsubmit="destroy(event)" action="' . route('customer.destroy', $user->id) . '" method="POST">
                            <input type="hidden" name="_token" value="'. @csrf_token() .'" enctype="multipart/form-data">
                            <a href="#" class="btn btn-sm btn-warning rounded mb-1" data-bs-toggle="modal" data-bs-target="#editCustomerModal'. $user->id. '"><i class="fa fa-edit"></i></a>
                            <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm btn-danger mr-2 mb-1">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </form>
                    </div>
                ';
            })
            ->addColumn('images', function ($user) {
                if (auth()->user()->images) {
                    return ' <img src="' . asset('storage/images/' . $user->images) . '" class="img-circle elevation-2" alt="' . $user->images . '" width="50" height="50"  style="border: 3px white solid"> ';
            }
                else {
                    return ' <img src="' . asset('img/user-profile-default.jpg') . '" class="img-circle elevation-2" alt="' . $user->images . '" width="50" height="50"  style="border: 3px white solid"> ';
                }
            })
            ->addIndexColumn()
            ->escapeColumns(['action'])
            ->toJson();
    }



    public function index()
    {
        $users = User::all();
        return view('dashboard.customer.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {

        // Validate Request //
        $data = $request->validate(
            [
                'name' => 'required|string',
                'tanggal_lahir' => '',
                'jenis_kelamin' => 'required',
                'alamat' => '',
                'role' => 'required'
            ]
        );

        $findUser = User::find($user->id);
        $findUser->update($data);

        return redirect('/dashboard/customer')->with('success', 'User Updated Successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['success' => 'Post has been Deleted!']);
    }
}
