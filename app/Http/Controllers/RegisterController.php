<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\kota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $kota = Kota::all();
        $kecamatan = $request->has('kota') ? Kecamatan::where('id_kota', $request->get('kota'))->get() : Kecamatan::all();

        return view('register.index', [
            'kota' => $kota,
            'kecamatan' => $kecamatan,
        ]);
    }

    public function store(Request $request)
    {
        // Log the request data
        Log::info('Registration request data:', $request->all());

        // Perform validation
        $validatedData = $request->validate([
            'nik' => 'required|max:20|unique:users',
            'id_kota' => 'required',
            'id_kecamatan' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required|max:255',
            'status_perkawinan' => 'required',
            'pendapatan_perbulan' => 'required',
            'nama' => 'required|max:255',
            'nomer_telfon' => 'required',
            'tanggal_lahir' => 'required|date',
            'kota_kelahiran' => 'required',
            'pendidikan_terakhir' => 'required|max:255',
            'tanggungan' => 'required|integer',
            'alamat_lengkap' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status_approve' => 'required|integer',
            'password' => ['required', 'min:5', 'max:255']
        ]);

        Log::info('Validated data:', $validatedData);

        // Hash password if present
        if ($request->has('password')) {
            $validatedData['password'] = Hash::make($request->input('password'));
        }

        // Try to create user
        try {
            User::create($validatedData);
            Log::info('User created successfully.');
            return redirect('/login')->with('success', 'Registration successful! Please Login.');
        } catch (\Exception $e) {
            Log::error('Error creating user:', ['exception' => $e]);
            return redirect()->back()->with('error', 'Failed to register user.');
        }
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
