<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Supplier;
use App\Models\SuratJalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all();
        $suppliers = Supplier::all();
        $suratjalan = SuratJalan::all();
        return view('suratjalan.index',[

            'users' => $users,
            'suppliers' => $suppliers,
            'suratjalan' => $suratjalan,
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
    $request->validate([
        'kode_surat_jalan' => 'required',
        'supplier_id' => 'required',
        'tanggal_masuk' => 'required',
    ]);

    $suratJalan = new SuratJalan();
    $suratJalan->kode_surat_jalan = $request->kode_surat_jalan;

    $user = Auth::user();
    $suratJalan->nama_petugas = $user->name;

    // Mengambil nama supplier berdasarkan supplier_id
    $supplier = Supplier::findOrFail($request->supplier_id);
    $suratJalan->nama_supplier = $supplier->nama_supplier;

    $suratJalan->tanggal_masuk = $request->tanggal_masuk;
    $suratJalan->save();

    return redirect()->route('suratjalan.index')->with('success', 'Data surat jalan berhasil ditambahkan.');
    }

    // SuratJalanController
    public function getData(Request $request)
    {
    $kodeSuratJalan = $request->kode_surat_jalan;

    $suratJalan = SuratJalan::where('kode_surat_jalan', $kodeSuratJalan)->first();

    if ($suratJalan) {
        $namaPetugas = $suratJalan->nama_petugas;
        $tanggalTerima = $suratJalan->tanggal_masuk;
        $namaSupplier = $suratJalan->nama_supplier;

        return response()->json([
            'nama_petugas' => $namaPetugas,
            'tanggal_terima' => $tanggalTerima,
            'nama_supplier' => $namaSupplier
        ]);
    }

    return response()->json(null);
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
    $suratJalan = SuratJalan::findOrFail($id);
    $suppliers = Supplier::all();
    return view('suratjalan.edit', compact('suratJalan', 'suppliers'));
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
        'kode_surat_jalan' => 'required',
        'supplier_id' => 'required',
        'tanggal_masuk' => 'required',
    ]);

    $suratJalan = SuratJalan::findOrFail($id);
    $suratJalan->kode_surat_jalan = $request->kode_surat_jalan;
    
    // Mengambil nama supplier berdasarkan supplier_id
    $supplier = Supplier::findOrFail($request->supplier_id);
    $suratJalan->nama_supplier = $supplier->nama_supplier;

    $suratJalan->tanggal_masuk = $request->tanggal_masuk;
    $suratJalan->save();

    return redirect()->route('suratjalan.index')->with('success', 'Data surat jalan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $suratJalan = SuratJalan::findOrFail($id);
    $suratJalan->delete();

    return redirect()->route('suratjalan.index')->with('success', 'Data surat jalan berhasil dihapus.');
}
}
