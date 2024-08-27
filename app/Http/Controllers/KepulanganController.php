<?php

namespace App\Http\Controllers;



use Carbon\Carbon;
use App\Models\kepulangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorekepulanganRequest;
use App\Http\Requests\UpdatekepulanganRequest;

class KepulanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // @dd('hai');
        // Mengambil semua data dari tabel kepulangan
        $kepulangan = kepulangan::with('user')->where('id_user',auth()->user()->id)->get();

        // Debugging: Cek data yang diambil
        // Log::info('Kepulangan Data:', $kepulangan->toArray());

        // Mengirim data ke view
        return view('warga.kepulangan.index', [
            'kepulangan' => $kepulangan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form pembuatan baru jika diperlukan
        return view('warga.kepulangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'tanggal_kepulangan' => 'required|date',
            'status_perkawinan' => 'required|boolean',
            'alasan_kepulangan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'jadwal_kembali' => 'nullable|date',
            'no_hp' => 'required|string|max:255',
            'alamat_kepulangan' => 'required|string|max:255',
        ]);

        // Jika checkbox tidak dicentang, set jadwal kembali ke null
        $jadwalKembali = $request->has('has_jadwal_kembali') ? $request->jadwal_kembali : null;

        // Buat record kepulangan baru
        kepulangan::create([
            'id_user' => auth()->user()->id,
            'id_keberangkatan' => 1, // Atur ini sesuai kebutuhan
            'tanggal_kepulangan' => $validatedData['tanggal_kepulangan'],
            'status_perkawinan' => $validatedData['status_perkawinan'],
            'alasan_kepulangan' => $validatedData['alasan_kepulangan'],
            'pekerjaan' => $validatedData['pekerjaan'],
            'jadwal_kembali' => $jadwalKembali,
            'no_hp' => $validatedData['no_hp'],
            'alamat_kepulangan' => $validatedData['alamat_kepulangan'],
            'status_approve' => false,
        ]);

        // Redirect dengan pesan sukses
        return redirect('/kepulangan')->with('success', 'Data kepulangan berhasil ditambahkan.');
    }




    /**
     * Display the specified resource.
     */
    public function show(kepulangan $kepulangan)
    {

        // Format tanggal kepulangan
        $kepulangan->tanggal_kepulangan = Carbon::parse($kepulangan->tanggal_kepulangan);
        $kepulangan->jadwal_kembali = $kepulangan->jadwal_kembali ? Carbon::parse($kepulangan->jadwal_kembali) : null;

        // Mengirim data ke view
        return view('warga.kepulangan.show', [
            'pulang' => $kepulangan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kepulangan $kepulangan)
    {
        // Format tanggal kepulangan
        $kepulangan->tanggal_kepulangan = Carbon::parse($kepulangan->tanggal_kepulangan);
        $kepulangan->jadwal_kembali = $kepulangan->jadwal_kembali ? Carbon::parse($kepulangan->jadwal_kembali) : null;

        // Mengirim data ke view
        return view('warga.kepulangan.edit', [
            'pulang' => $kepulangan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, Kepulangan $kepulangan)
    {
        // Mendefinisikan aturan validasi
        $rules = [
            'alasan_kepulangan' => 'required|string|max:255',
            'alamat_kepulangan' => 'required|string|max:255',
            'tanggal_kepulangan' => 'required|date',
            'status_perkawinan' => 'required|boolean',
            'pekerjaan' => 'required|string|max:255',
            'jadwal_kembali' => 'nullable|date',
            'no_hp' => 'required|string|max:255',
            'status_approve' => 'required|boolean', // Pastikan untuk validasi boolean
            // 'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ];

        // Validasi data request
        $validatedData = $request->validate($rules);
         // Jika checkbox tidak dicentang, set jadwal kembali ke null
        if (!$request->has('jadwal_kembali')) {
            $validatedData['jadwal_kembali'] = null;
        }


        // Debugging: Cek data yang tervalidasi
        Log::info('Validated Data:', $validatedData);

        // Proses upload gambar jika ada
        // if ($request->hasFile('image')) {
        //     // Hapus gambar lama jika ada
        //     if ($kepulangan->image && Storage::exists($kepulangan->image)) {
        //         Storage::delete($kepulangan->image);
        //     }
        //     // Simpan gambar baru
        //     $validatedData['image'] = $request->file('image')->store('post-image');
        // }

        // Update data kepulangan
        $kepulangan->update($validatedData);

        // Debugging: Cek data setelah update
        Log::info('Kepulangan Data After Update:', $kepulangan->fresh()->toArray());

        // Redirect dengan pesan sukses
        return redirect('/kepulangan')->with('success', 'Data kepulangan telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kepulangan $kepulangan)
    {
        // Hapus gambar jika ada
        if ($kepulangan->image) {
            Storage::delete($kepulangan->image);
        }

        // Hapus data kepulangan
        $kepulangan->delete();

        // Redirect dengan pesan sukses
        return redirect('/kepulangan')->with('success', 'Data kepulangan telah dihapus!');
    }
}
