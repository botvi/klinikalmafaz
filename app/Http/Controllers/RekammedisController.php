<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekammedis;
use App\Models\Pasien;
use App\Models\Dokter;
use RealRashid\SweetAlert\Facades\Alert;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = Rekammedis::all();
        return view('pageadmin.rekammedis.index', compact('rekamMedis'));
    }

    public function tambah()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('pageadmin.rekammedis.tambah', compact('pasiens', 'dokters'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_kunjungan' => 'required|date',
            'keluhan' => 'required|string',
            'diagnosis' => 'required|string',
            'tindakan' => 'required|string',
            'resep' => 'required|string',
        ]);

        Rekammedis::create($validatedData);

        Alert::success('Berhasil', 'Data rekam medis berhasil disimpan');

        return redirect()->route('rekam_medis.index');
    }

    public function edit($id)
    {
        $rekamMedis = Rekammedis::findOrFail($id);
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('pageadmin.rekammedis.edit', compact('rekamMedis', 'pasiens', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_kunjungan' => 'required|date',
            'keluhan' => 'required|string',
            'diagnosis' => 'required|string',
            'tindakan' => 'required|string',
            'resep' => 'required|string',
        ]);

        $rekamMedis = Rekammedis::findOrFail($id);
        $rekamMedis->update($validatedData);

        Alert::success('Berhasil', 'Data rekam medis berhasil diupdate');

        return redirect()->route('rekam_medis.index');
    }

    public function destroy($id)
    {
        $rekamMedis = Rekammedis::findOrFail($id);
        $rekamMedis->delete();

        Alert::success('Berhasil', 'Data rekam medis berhasil dihapus');

        return redirect()->route('rekam_medis.index');
    }
}
