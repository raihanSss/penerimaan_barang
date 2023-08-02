<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penerimaan;
use App\Models\Supplier;
use App\Models\SuratJalan;
use App\Models\Users;
use App\Notifications\NewDataNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerimaan = Penerimaan::all();
        $barang = Barang::all();
        $suratjalan = SuratJalan::all();
        $suppliers = Supplier :: all();

        return view('penerimaan.index', [
            'barang' => $barang,
            'suratjalan' => $suratjalan,
            'suppliers'=> $suppliers,
            'penerimaan' => $penerimaan,
            'authuser' => Auth::user()
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
    $validator = Validator::make($request->all(), [
        'kode_penerimaan' => 'required',
        'kode_surat_jalan' => 'required',
        'nama_petugas' => 'required',
        'nama_supplier' => 'required',
        'nama_barang' => 'required',
        'quantity' => 'required|numeric',
        'tanggal_terima' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $penerimaan = new Penerimaan();
    $penerimaan->kode_penerimaan = $request->kode_penerimaan;
    $penerimaan->kode_surat_jalan = $request->kode_surat_jalan;
    $penerimaan->nama_petugas = $request->nama_petugas;
    $penerimaan->nama_supplier = $request->nama_supplier;
    $penerimaan->nama_barang = $request->nama_barang;
    $penerimaan->quantity = $request->quantity;
    $penerimaan->tanggal_terima = $request->tanggal_terima;
    $penerimaan->save();

    // Mengupdate stok barang
    $barang = Barang::where('nama_barang', $request->nama_barang)->first();

    if ($barang) {
        $barang->stok_barang += $request->quantity;
        $barang->save();
    }

    return redirect()->route('penerimaan.index')->with('success', 'Data penerimaan berhasil ditambahkan.');


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $penerimaan = Penerimaan::find($id);

    if (!$penerimaan) {
        return redirect()->back()->withErrors('Data penerimaan tidak ditemukan.');
    }

    // Menghapus penerimaan
    $penerimaan->delete();

    return redirect()->route('penerimaan.index')->with('success', 'Data penerimaan berhasil dihapus.');
    }
}
