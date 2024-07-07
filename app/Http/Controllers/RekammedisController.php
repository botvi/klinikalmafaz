<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekammedis;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Penyakit;
use App\Models\Perawat;
use RealRashid\SweetAlert\Facades\Alert;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekam_medis = Rekammedis::with('pasien', 'dokter', 'perawat', 'penyakit')
            ->get();
        return view('pageadmin.rekammedis.index', compact('rekam_medis'));
    }

    public function tambah()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        $perawats = Perawat::all();
        $penyakits = Penyakit::all();
        return view('pageadmin.rekammedis.tambah', compact('pasiens', 'dokters', 'perawats', 'penyakits'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "pasien_id" => 'required',
                "dokter_id" => 'required',
                "perawat_id" => 'nullable',
                "penyakit_id" => 'required',
                "keterangan" => 'nullable',
            ]);

            $model = null;
            if (!empty($request->id)) {
                $model = Rekammedis::findOrFail($request->id);
            } else {
                $model = new Rekammedis();
            }

            $model->fill($validatedData);
            if ($model->save()) {
                Alert::success('Berhasil', 'Data rekam medis berhasil disimpan');
            } else {
                Alert::error('Error', 'Data rekam medis gagal disimpan');
            }
            return redirect()->route('rekam_medis.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Data rekam medis gagal disimpan');
            return redirect()->route('rekam_medis.create');
        }
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
