<?php

namespace App\Http\Controllers;



use App\Models\kepulangan;
use App\Http\Requests\StorekepulanganRequest;
use App\Http\Requests\UpdatekepulanganRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class DashboardKepulanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idKota = auth()->user()->id_kota;


        // Mengambil semua data dari tabel kepulangan
        $kepulangan = kepulangan::join('users', 'kepulangan.id_user', '=', 'users.id')
        ->where('users.id_kota', $idKota)
        ->select('kepulangan.*')
        ->get();
        // Debugging: Cek data yang diambil
        Log::info('Kepulangan Data:', $kepulangan->toArray());

        // Mengirim data ke view
        return view('admin.kepulangan.index', [
            'kepulangan' => $kepulangan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form pembuatan baru jika diperlukan
        return view('admin.kepulangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorekepulanganRequest $request)
    {
        // Mendefinisikan aturan validasi
        $validatedData = $request->validated();

        // Debugging: Cek data yang tervalidasi
        Log::info('Validated Data:', $validatedData);

        // Menyimpan data baru
        kepulangan::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect('/dashboard/kepulangan')->with('success', 'Data kepulangan telah ditambahkan!');
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
        return view('admin.kepulangan.show', [
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
        return view('admin.kepulangan.edit', [
            'pulang' => $kepulangan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kepulangan $kepulangan)
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
        'status_approve' => 'required|boolean',
    ];

    // Validasi data request
    $validatedData = $request->validate($rules);

    // Jika checkbox tidak dicentang, set jadwal kembali ke null
    if (!$request->has('jadwal_kembali')) {
        $validatedData['jadwal_kembali'] = null;
    }

    // Debugging: Cek data yang tervalidasi
    Log::info('Validated Data:', $validatedData);

    // Update data kepulangan
    $kepulangan->update($validatedData);

    // Debugging: Cek data setelah update
    Log::info('Kepulangan Data After Update:', $kepulangan->fresh()->toArray());

    // Redirect dengan pesan sukses
    return redirect('/dashboard/kepulangan')->with('success', 'Data kepulangan telah diperbarui!');
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
        return redirect('/dashboard/kepulangan')->with('success', 'Data kepulangan telah dihapus!');
    }
}
