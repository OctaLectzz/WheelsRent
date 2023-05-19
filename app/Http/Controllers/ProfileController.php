<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile');
    }

    public function update(Request $request)
    {

        // Validate Request //
        $data = $request->validate(
            [
                'images' => 'image|file|max:2048',
                'name' => 'required|string',
                'tanggal_lahir' => 'date',
                'jenis_kelamin' => 'string'
            ]
        );
        $data['alamat'] = $request->alamat;

        // Request Images //
        if ($request->hasFile('images')) {
            $newImage = $request->images->getClientOriginalName();
            $request->images->storeAs('public/images', $newImage);
            $data['images'] = $newImage;
        }

        $user = Auth::user();
        $findUser = User::find($user->id);
        $findUser->update($data);

        return redirect()->back()->with('success', 'Berhasil Mengedit Profile');
    }
}
