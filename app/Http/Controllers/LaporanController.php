<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Rekammedis;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pageadmin.laporan.index', compact('pasiens'));
    }


    // cetak
    public function cetak_pasien()
    {
        $pasiens = Pasien::all();
        return view('pageadmin.laporan.lp_pasien_cetak', compact('pasiens'));
    }

    public function catatan($id)
    {
        $rekam_medis = Rekammedis::with('pasien', 'dokter', 'perawat', 'penyakit')
            ->orderBy('created_at', 'desc')
            ->where('pasien_id', $id)
            ->get();
        return view('pageadmin.laporan.lp_rm', compact('rekam_medis'));
    }

    // cetak
    public function cetak_catatan($id)
    {
        $rekam_medis = Rekammedis::with('pasien', 'dokter', 'perawat', 'penyakit')
            ->orderBy('created_at', 'desc')
            ->where('pasien_id', $id)
            ->get();
        return view('pageadmin.laporan.lp_rm_cetak', compact('rekam_medis'));
    }
}
