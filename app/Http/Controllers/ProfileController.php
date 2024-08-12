<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();

        // Jika metode HTTP adalah POST, maka lakukan update
        if ($request->isMethod('post')) {
            // Validasi data yang diinput oleh pengguna
            $request->validate([
                'nik' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'kota_kelahiran' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'pekerjaan' => 'nullable|string|max:255',
                'nomer_telfon' => 'nullable|string|max:15',
            ]);

            // Update data pengguna dengan data baru
            $user->nik = $request->nik;
            $user->nama = $request->nama;
            $user->kota_kelahiran = $request->kota_kelahiran;
            $user->tanggal_lahir = $request->tanggal_lahir;
            $user->pekerjaan = $request->pekerjaan;
            $user->nomer_telfon = $request->nomer_telfon;

            // Simpan perubahan ke database
            $user->save();

            // Redirect ke halaman profil dengan pesan sukses
            return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
        }

        // Menampilkan form profil dengan data pengguna
        return view('warga.profile', compact('user'));
    }
}
