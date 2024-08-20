<?php

namespace App\Http\Controllers;

use App\Models\keberangkatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class DashboardkeberangkatanController extends Controller
{
    public function index()
{
    $idKota = auth()->user()->id_kota;

    $keberangkatan = Keberangkatan::join('users', 'keberangkatan.id_user', '=', 'users.id')
        ->where('users.id_kota', $idKota)
        ->select('keberangkatan.*')
        ->get();

    return view('admin.keberangkatan.index', [
        'keberangkatan' => $keberangkatan
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
    public function show(keberangkatan $keberangkatan)
    {
        $keberangkatan->tanggal_keberangkatan = Carbon::parse($keberangkatan->tanggal_keberangkatan);
        return view('admin.keberangkatan.show',[
            'berangkat'=> $keberangkatan
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(keberangkatan $keberangkatan)
    {
        $keberangkatan->tanggal_keberangkatan = Carbon::parse($keberangkatan->tanggal_keberangkatan);
        return view('admin.keberangkatan.edit',[
            'berangkat'=> $keberangkatan
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, keberangkatan $keberangkatan)
{
    // Mendefinisikan aturan validasi
    $rules = [
        'nama_perusahaan' => 'required|string|max:255',
        'negara_tujuan' => 'required|string|max:255',
        'tanggal_keberangkatan' => 'required|date',
        'jenis_pekerjaan' => 'required|string|max:255',
        'alamat_di_luar_negeri' => 'required|string|max:255',
        'status_perkawinan' => 'required|boolean',
        'biaya_pemberangkatan' => 'required|numeric',
        'masa_kontrak' => 'required|numeric',
        'gaji_perbulan' => 'required|numeric',
        'asuransi' => 'required|string|max:255',
        'status_approve' => 'required|boolean', // Pastikan untuk validasi boolean
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ];

    // Validasi data request
    $validatedData = $request->validate($rules);

    // Debugging: Cek data yang tervalidasi
    Log::info('Validated Data:', $validatedData);

    // Proses upload gambar jika ada
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($keberangkatan->image && Storage::exists($keberangkatan->image)) {
            Storage::delete($keberangkatan->image);
        }
        // Simpan gambar baru
        $validatedData['image'] = $request->file('image')->store('user-image');
    }

    // Debugging: Cek data sebelum update
    Log::info('User Data Before Update:', $keberangkatan->toArray());
    Log::info('Data to Update:', $validatedData);

    // Update data pengguna
    $keberangkatan->update($validatedData);

    // Debugging: Cek data setelah update
    Log::info('User Data After Update:', $keberangkatan->fresh()->toArray());

    // Redirect dengan pesan sukses
    return redirect('/dashboard/keberangkatan')->with('success', 'Data keberangkatan Updated!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(keberangkatan $keberangkatan)
    {
        $hasKepulangan = $keberangkatan->kepulangan()->exists();

        if ($hasKepulangan) {
            // Jika ada data terkait, kembalikan dengan pesan error
            return redirect('/dashboard/keberangkatan')
                ->with('error', 'Tidak dapat menghapus keberangkatan karena ada data kepulangan yang terkait. Hapus data kepulangan terlebih dahulu.');
        }
        if($keberangkatan->image){
            Storage::delete($keberangkatan->image);
        }
        keberangkatan::destroy($keberangkatan->id);

        return redirect('/dashboard/warga')->with('success','warga Has Been Deleted!');
    }
}
