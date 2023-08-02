<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerimaan;
use App\Models\Retur;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{

    public function index()
    {
        $penerimaanData = Penerimaan::all();
        $returData = Retur::all();

        $data = [
            'penerimaan' => $penerimaanData,
            'retur' => $returData,
            'authuser' => Auth::user()
        ];

        return view('report.index', $data);
    }


    public function generateReport()
    {
        $penerimaanData = Penerimaan::all();
        $returData = Retur::all();

        // Menggabungkan data penerimaan dan retur menjadi satu koleksi
        $reportData = $penerimaanData->concat($returData);

        // Simpan data report ke dalam tabel report
        Report::insert($reportData->toArray());

        return "Report generated successfully!";
    }
}
