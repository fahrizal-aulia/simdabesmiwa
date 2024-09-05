<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kota;
use App\Models\Kecamatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mengubah format tanggal lahir user
        $user->tanggal_lahir = Carbon::parse($user->tanggal_lahir)->format('Y-m-d');

        // Mendapatkan daftar kota dan kecamatan
        $kotas = Kota::all();
        $kecamatans = Kecamatan::where('id_kota', $user->id_kota)->get();

        if ($request->isMethod('post')) {
            Log::info('Update Profile Request', $request->all());

            try {
                // Validasi input
                $rules = [
                    'id_kota' => 'required',
                    'id_kecamatan' => 'required',
                    'jenis_kelamin' => 'required',
                    'pekerjaan' => 'required|max:255',
                    'status_perkawinan' => 'required',
                    'pendapatan_perbulan' => 'required|numeric|max:100000000000',
                    'nama' => 'required|max:255',
                    'nomer_telfon' => 'required',
                    'tanggal_lahir' => 'required|date',
                    'kota_kelahiran' => 'required',
                    'pendidikan_terakhir' => 'required|max:255',
                    'tanggungan' => 'required|integer',
                    'alamat_lengkap' => 'required|max:255',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                    'old_password' => 'nullable',
                    'new_password' => 'nullable|min:8|confirmed',
                ];

                if ($request->nik != $user->nik) {
                    $rules['nik'] = 'required|unique:users,nik';
                }
                if ($request->email != $user->email) {
                    $rules['email'] = 'required|email:dns|unique:users,email';
                }

                $request->validate($rules);

                // Persiapkan data untuk update
                $updateData = [
                    'id_kota' => $request->id_kota,
                    'id_kecamatan' => $request->id_kecamatan,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'pekerjaan' => $request->pekerjaan,
                    'status_perkawinan' => $request->status_perkawinan,
                    'pendapatan_perbulan' => $request->pendapatan_perbulan,
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'nomer_telfon' => $request->nomer_telfon,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'kota_kelahiran' => $request->kota_kelahiran,
                    'pendidikan_terakhir' => $request->pendidikan_terakhir,
                    'tanggungan' => $request->tanggungan,
                    'alamat_lengkap' => $request->alamat_lengkap,
                ];

                // Handle file upload jika ada
                if ($request->hasFile('image')) {
                    // Hapus gambar lama jika ada
                    if ($user->image && Storage::exists($user->image)) {
                        Storage::delete($user->image);
                    }

                    $imagePath = $request->file('image')->store('post-image');
                    $updateData['image'] = $imagePath;
                }

                // Handle pembaruan password jika ada
                if ($request->filled('new_password')) {
                    if (!Hash::check($request->old_password, $user->password)) {
                        Log::warning('Password lama tidak cocok', ['user_id' => $user->id]);
                        return redirect()->back()->withErrors(['old_password' => 'Password lama tidak cocok.']);
                    }
                    $updateData['password'] = Hash::make($request->new_password);
                }

                // Perbarui data user menggunakan metode update Eloquent
                User::where('id', $user->id)->update($updateData);

                Log::info('Profil berhasil diperbarui', ['user_id' => $user->id]);
                return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
            } catch (\Exception $e) {
                Log::error('Error updating profile', ['error' => $e->getMessage()]);
                return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui profil.']);
            }
        }

        return view('warga.profile', compact('user', 'kotas', 'kecamatans'));
    }
    public function getKecamatanByKota($id)
    {
        Log::info('Fetching kecamatan for kota id:', ['id' => $id]);

        try {
            // Retrieve kecamatan based on kota id
            $kecamatan = Kecamatan::where('id_kota', $id)->get();
            return response()->json($kecamatan);
        } catch (\Exception $e) {
            Log::error('Error fetching kecamatan:', ['exception' => $e]);
            return response()->json(['error' => 'Failed to fetch kecamatan'], 500);
        }
    }
}
