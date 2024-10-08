<?php

namespace App\Http\Controllers;

use App\Models\keberangkatan;
use App\Models\User;
use App\Http\Requests\StorekeberangkatanRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;





class KeberangkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keberangkatan = Keberangkatan::with('user')->where('id_user',auth()->user()->id)->get();
        $users = User::find( auth()->user()->id);

        // dd($keberangkatan);
        return view('warga.keberangkatan.index',[
            'keberangkatan'=> $keberangkatan,
            'user'=>$users

            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::find( auth()->user()->id);
        return view('warga.keberangkatan.create', [
            'users' => $users,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request->all());
        $validatedData= $request-> validate([
            'nama_perusahaan' => 'required|string|max:255',
            'negara_tujuan' => 'required|string|max:255',
            'tanggal_keberangkatan' => 'required|date',
            'jenis_pekerjaan' => 'required|string|max:255',
            'alamat_di_luar_negeri' => 'required|string',
            'status_perkawinan' => 'required|boolean',
            'biaya_pemberangkatan' => 'required|numeric|max:100000000000',
            'masa_kontrak' => 'required|integer',
            'gaji_perbulan' => 'required|numeric|max:100000000000',
            'asuransi' => 'required|string',
        ]);

        $validatedData['id_user']=auth()->user()->id;

        keberangkatan::create($validatedData);

        return redirect('/keberangkatan')->with('success','Keberangkatan Has Been Added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(keberangkatan $keberangkatan)
    {
        $keberangkatan->tanggal_keberangkatan = Carbon::parse($keberangkatan->tanggal_keberangkatan);
        return view('warga.keberangkatan.show',[
            'berangkat'=> $keberangkatan
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(keberangkatan $keberangkatan)
    {
        $keberangkatan->tanggal_keberangkatan = Carbon::parse($keberangkatan->tanggal_keberangkatan);
        return view('warga.keberangkatan.edit',[
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
        // 'NIK'=> 'required',
        'nama_perusahaan' => 'required|string|max:255',
        'negara_tujuan' => 'required|string|max:255',
        'tanggal_keberangkatan' => 'required|date',
        'jenis_pekerjaan' => 'required|string|max:255',
        'alamat_di_luar_negeri' => 'required|string|max:255',
        'status_perkawinan' => 'required|boolean',
        'biaya_pemberangkatan' => 'required|numeric|max:100000000000',
        'masa_kontrak' => 'required|integer',
        'gaji_perbulan' => 'required|numeric|max:100000000000',
        'asuransi' => 'required|string|max:255',
        'status_approve' => 'required|boolean', // Pastikan untuk validasi boolean
        // 'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ];

    $validatedData = $request->validate($rules);


    // if ($request->hasFile('image')) {
    //     if ($keberangkatan->image && Storage::exists($keberangkatan->image)) {
    //         Storage::delete($keberangkatan->image);
    //     }
    //     $validatedData['image'] = $request->file('image')->store('post-image');
    // }

    $keberangkatan->update($validatedData);
    return redirect('/keberangkatan')->with('success', 'Data keberangkatan Updated!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(keberangkatan $keberangkatan)
    {
        $hasKepulangan = $keberangkatan->kepulangan()->exists();

        if ($hasKepulangan) {
            // Jika ada data terkait, kembalikan dengan pesan error
            return redirect('/keberangkatan')
                ->with('error', 'Tidak dapat menghapus keberangkatan karena ada data kepulangan yang terkait. Hapus data kepulangan terlebih dahulu.');
        }
        if($keberangkatan->image){
            Storage::delete($keberangkatan->image);
        }
        keberangkatan::destroy($keberangkatan->id);

        return redirect('/keberangkatan')->with('success','Keberangkatan Deleted!');
    }
}
