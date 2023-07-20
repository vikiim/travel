<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = Petugas::with('level')->get();
        return response()->json($petugas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:petugas',
            'password' => 'required',
            'nama_petugas' => 'required',
            'id_level' => 'required|exists:level,id'
        ]);

        $petugas = Petugas::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nama_petugas' => $request->nama_petugas,
            'id_level' => $request->id_level
        ]);

        if (Petugas::where('username', $request->username)->exists()) {
            return response()->json(['error' => 'Username Allready exists'], 400);
        }

        return response()->json($petugas, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petugas = Petugas::with('level')->find($id);

        if (!$petugas) {
            return response()->json(['message' => 'Petugas tidak di temukan'], 404);
        }

        return response()->json($petugas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|unique:petugas',
            'password' => 'required',
            'nama_petugas' => 'required',
            'id_level' => 'required|exists:level,id'
        ]);

        $petugas = Petugas::find($id);

        if (!$petugas) {
            return response()->json(['message' => 'Petugas Tidak Ditemukan'], 404);
        }
        $petugas->username = $request->username;
        $petugas->password = bcrypt($request->password);
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->id_level = $request->id_level;
        $petugas->save();

        return response()->json($petugas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = Petugas::find($id);

        if (!$petugas) {
            return response()->json(['message' => 'Petugas Tidak Ditemukan'], 404);
        }
        $petugas->delete();

        return response()->json(['message' => 'Petugas Berhasil Dihapus']);
    }
}
