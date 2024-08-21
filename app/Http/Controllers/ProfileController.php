<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(Request $request)
{
    $user = Auth::user();

    if ($request->isMethod('post')) {
        $request->validate([
            'nik' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'kota_kelahiran' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'pekerjaan' => 'nullable|string|max:255',
            'nomer_telfon' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi image
        ]);

        // Prepare update data
        $updateData = [
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kota_kelahiran' => $request->kota_kelahiran,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pekerjaan' => $request->pekerjaan,
            'nomer_telfon' => $request->nomer_telfon,
        ];

        // Handle file upload if exists
        if ($request->hasFile('image')) {
            if ($user->image && Storage::exists('public/' . $user->image)) {
                Storage::delete('public/' . $user->image);
            }

            $path = $request->file('image')->store('profiles', 'public');
            $updateData['image'] = $path;
        }

        // Update user record using Eloquent update method
        User::where('id', $user->id)->update($updateData);

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    return view('warga.profile', compact('user'));
}

}
