<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = Petugas::all();
        return view('petugas/index', [
            'petugas' => $petugas,
            'authuser' => Auth::user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'nip' => 'required|numeric|digits:7',
            'nama_petugas' => 'required',
            'alamat_petugas' => 'required',
            'no_telp_petugas' => 'required|numeric|digits:10',
            'jabatan' => 'required',
        ]);

        // Simpan data ke dalam database
        Petugas::create($validatedData);

        // Redirect ke halaman index dengan pesan success
        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = Petugas::find($id);
        return view('petugas.edit', compact('petugas'));
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
        // Validasi data inputan jika diperlukan
        $request->validate([
            'nip' => 'required',
            'nama_petugas' => 'required',
            'alamat_petugas' => 'required',
            'no_telp_petugas' => 'required',
            'jabatan' => 'required',
        ]);

        // Temukan data petugas yang akan diupdate
        $petugas = Petugas::find($id);

        // Update data petugas
        $petugas->update($request->all());

        // Redirect ke halaman index dengan notifikasi
        return redirect()->route('petugas.index')->with('success', ' Data petugas berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan data petugas yang akan dihapus
        $petugas = Petugas::find($id);

        // Hapus data petugas
        $petugas->delete();

        // Redirect ke halaman index dengan notifikasi
        return redirect()->route('petugas.index')->with('success', ' Data petugas berhasil dihapus');
    }
}
