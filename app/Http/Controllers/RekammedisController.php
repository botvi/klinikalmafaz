<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rekammedis;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Penyakit;
use App\Models\Perawat;
use RealRashid\SweetAlert\Facades\Alert;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekam_medis = Rekammedis::with('pasien', 'dokter', 'perawat', 'penyakit')
            ->get()
            ->map(function ($rekam_medis) {
                $resep = collect(json_decode($rekam_medis->resep))->map(function ($item) {
                    $getResepById = Obat::findOrFail($item);
                    return $getResepById->nama;
                })->toArray();
                $rekam_medis->resep = implode(', ', $resep);
                return $rekam_medis;
            });

        return view('pageadmin.rekammedis.index', compact('rekam_medis'));
    }

    public function tambah()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        $perawats = Perawat::all();
        $penyakits = Penyakit::all();
        $obats = Obat::all();
        return view('pageadmin.rekammedis.tambah', compact('pasiens', 'dokters', 'perawats', 'penyakits', 'obats'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "pasien_id" => 'required',
                "dokter_id" => 'required',
                "perawat_id" => 'nullable',
                "penyakit_id" => 'required',
            ]);

            $model = null;
            if (!empty($request->id)) {
                $model = Rekammedis::findOrFail($request->id);
            } else {
                $model = new Rekammedis();
            }

            $model->fill(collect($validatedData)->merge([
                "tindakan" => $request->tindakan,
                "diagnosa" => $request->diagnosa,
                "resep" => json_encode($request->resep),
            ])->toArray());
            if ($model->save()) {
                Alert::success('Berhasil', 'Data rekam medis berhasil disimpan');
            } else {
                Alert::error('Error', 'Data rekam medis gagal disimpan');
            }
            return redirect()->route('rekam_medis.index');
        } catch (\Throwable $th) {
            // dd($th);
            Alert::error('Error', 'Data rekam medis gagal disimpan');
            return redirect()->route('rekam_medis.create');
        }
    }

    public function edit($id)
    {
        $rekamMedis = Rekammedis::findOrFail($id);
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        $perawats = Perawat::all();
        $penyakits = Penyakit::all();
        $obats = Obat::all();
        return view('pageadmin.rekammedis.edit', compact('rekamMedis', 'pasiens', 'dokters', 'perawats', 'penyakits', 'obats'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                "pasien_id" => 'required',
                "dokter_id" => 'required',
                "perawat_id" => 'nullable',
                "penyakit_id" => 'required',
            ]);
            $rekamMedis = Rekammedis::findOrFail($id);
            $rekamMedis->update(collect($validatedData)->merge([
                "tindakan" => $request->tindakan,
                "diagnosa" => $request->diagnosa,
                "resep" => json_encode($request->resep),
            ])->toArray());

            Alert::success('Berhasil', 'Data rekam medis berhasil diupdate');

            return redirect()->route('rekam_medis.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Data rekam medis gagal diupdate');
            // return redirect()->route('rekam_medis.edit', $id);
        }
    }

    public function destroy($id)
    {
        $rekamMedis = Rekammedis::findOrFail($id);
        $rekamMedis->delete();

        Alert::success('Berhasil', 'Data rekam medis berhasil dihapus');

        return redirect()->route('rekam_medis.index');
    }
}
