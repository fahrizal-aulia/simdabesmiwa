<?php

namespace App\Http\Controllers\Api;

use App\Models\Hewan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiMapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $hewan = Hewan::all();
        return response()->json($hewan);
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
    public function show(Hewan $hewan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hewan $hewan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hewan $hewan)
    {
        //
    }
}
