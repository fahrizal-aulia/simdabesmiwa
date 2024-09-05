<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\kota;
use App\Models\kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DashboardwargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = user::where('status_approve', 1)->where('role', 2)->where('id_kota',auth()->user()->id_kota)->get();
        return View ('admin.warga.index',[
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
        Log::info('User ID diterima: ', ['id' => $user->id]);

        $user->tanggal_lahir = Carbon::parse($user->tanggal_lahir);

        return view('admin.warga.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        $user->tanggal_lahir = Carbon::parse($user->tanggal_lahir);
        $kotas = Kota::all();
        $kecamatans = Kecamatan::where('id_kota', $user->id_kota)->get();
        return view('admin.warga.edit', [
            'user' => $user,
            'kota' => $kotas,
            'kecamatan' => $kecamatans
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        $rules= [
            'nama' => 'required|string|max:255',
            'id_kota' => 'required',
            'id_kecamatan' => 'required',
            'kota_kelahiran' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'pekerjaan' => 'required|string|max:255',
            'status_perkawinan' => 'required|boolean',
            'pendapatan_perbulan' => 'required|numeric|max:100000000000',
            'nomer_telfon' => 'required|numeric',
            'pendidikan_terakhir' => 'required|string|max:255',
            'tanggungan' => 'required|numeric',
            'alamat_lengkap' => 'required|string',
            'status_approve' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',

            ];


            if ($request->nik != $user->nik) {
                $rules['nik'] = 'required|unique:users,nik';
            }
            if ($request->email != $user->email) {
                $rules['email'] = 'required|email:dns|unique:users,email';
            }
            $validatedData= $request-> validate($rules);

            if ($request->file('image')) {
                if($request->oldImage){
                    Storage::delete($request->oldImage);
                }
                $validatedData['image']= $request->file('image')->store('post-image');
            }

            $user->update($validatedData);

            return redirect('/dashboard/warga')->with('success','Data Warga Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        if($user->image){
            Storage::delete($user->image);
        }
        user::destroy($user->id);

        return redirect('/dashboard/warga')->with('success','warga Has Been Deleted!');
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
