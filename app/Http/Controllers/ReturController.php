<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\SuratJalan;
use App\Models\Retur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retur = Retur::all();
        $barang = Barang::all();
        $suratjalan = SuratJalan::all();
        $suppliers = Supplier :: all();

        return view('retur.index', [
            'barang' => $barang,
            'suratjalan' => $suratjalan,
            'suppliers'=> $suppliers,
            'retur' => $retur,
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
        'kode_retur' => 'required',
        'kode_surat_jalan' => 'required',
        'nama_petugas' => 'required',
        'nama_supplier' => 'required',
        'nama_barang' => 'required',
        'quantity_retur' => 'required|numeric',
        'tanggal_retur' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $retur = new Retur();
    $retur->kode_retur = $request->kode_retur;
    $retur->kode_surat_jalan = $request->kode_surat_jalan;
    $retur->nama_petugas = $request->nama_petugas;
    $retur->nama_supplier = $request->nama_supplier;
    $retur->nama_barang = $request->nama_barang;
    $retur->quantity_retur = $request->quantity_retur;
    $retur->tanggal_retur = $request->tanggal_retur;
    $retur->save();

    return redirect()->route('retur.index')->with('success', 'Data retur berhasil ditambahkan.');
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
    $retur = Retur::findOrFail($id);
    $retur->delete();

    return redirect()->route('retur.index')->with('success', 'Data retur berhasil dihapus.');
    }
}
