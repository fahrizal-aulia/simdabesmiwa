<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\kota;
use App\Models\kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;



class DashboardpendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = user::all();
        return View ('admin.pendaftar.index',[
            'users'=> $user
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->tanggal_lahir = Carbon::parse($user->tanggal_lahir);
        Log::debug('User object:', ['user' => $user]);
    Log::info('Menampilkan detail pendaftar dengan ID: ' . ($user->id ?? 'ID tidak tersedia'));

    return view('admin.pendaftar.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {

        $user->tanggal_lahir = Carbon::parse($user->tanggal_lahir);
        $kotas = Kota::all();
        $kecamatans = Kecamatan::where('id_kota', $user->id_kota)->get();// Jika Anda memerlukan semua kecamatan

        return view('admin.pendaftar.edit', [
            'user' => $user,
            'kota' => $kotas,
            'kecamatan' => $kecamatans // Hanya jika Anda ingin menampilkan semua kecamatan
        ]);

    }

    /**
     * Update the specified resource in storage.
     */


     public function update(Request $request, User $user)
    {
        $rules= [
        'nama' => 'required|string|max:255',
        'id_kota' => 'required',
        'id_kecamatan' => 'required',
        'kota_kelahiran' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'pekerjaan' => 'required|string|max:255',
        'status_perkawinan' => 'required|boolean',
        'pendapatan_perbulan' => 'required|numeric',
        'nomer_telfon' => 'required|numeric',
        'pendidikan_terakhir' => 'required|string|max:255',
        'tanggungan' => 'required|numeric',
        'alamat_lengkap' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',

        ];


        if ($request->nik != $user->nik) {
            $rules['nik'] = 'required|unique:users,nik'.$user->nik;
        }
        $validatedData= $request-> validate($rules);

        if ($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image']= $request->file('image')->store('user-image');
        }

        $user->update($validatedData);

        return redirect('/dashboard/pendaftar')->with('success','user Has Been Updated!');
    }

// public function update(Request $request, User $user)
// {
//     // Rules untuk validasi
//     $rules = [
//         'nik' => 'required|',
//         'nama' => 'required|string|max:255',
//         'id_kota' => 'required',
//         'id_kecamatan' => 'required',
//         'kota_kelahiran' => 'required|string|max:255',
//         'tanggal_lahir' => 'required|date',
//         'pekerjaan' => 'required|string|max:255',
//         'status_perkawinan' => 'required|boolean',
//         'pendapatan_perbulan' => 'required|numeric',
//         'nomer_telepon' => 'required|numeric',
//         'pendidikan_terakhir' => 'required|string|max:255',
//         'tanggungan_anak' => 'required|numeric',
//         'alamat_lengkap' => 'required|string',
//         'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
//     ];

//     // Jika nik berubah, tambahkan validasi unique
//     if ($request->nik != $user->nik) {
//         $rules['nik'] = 'required|unique:users,nik';
//     }

//     // Validasi data
//     $validatedData = $request->validate($rules);

//     // Jika ada file image baru yang diupload
//     if ($request->file('image')) {
//         // Hapus gambar lama jika ada
//         if ($user->image) {
//             Storage::disk('public')->delete($user->image);
//         }
//         // Simpan gambar baru dan masukkan ke dalam array validatedData
//         $validatedData['image'] = $request->file('image')->store('images', 'public');
//     }

//     // Set user ID yang mengupdate data
//     $validatedData['user_id'] = auth()->user()->id;

//     // Update data pengguna
//     $user->update($validatedData);

//     return redirect('/dashboard/pendaftar')->with('success', 'Data pendaftar telah berhasil diperbarui!');
// }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }
}
