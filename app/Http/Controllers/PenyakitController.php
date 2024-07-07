<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenyakitController extends Controller
{
    public function fromRequest(
        $id = null,
        $nama,
        $deskripsi,
        $solusi,
        $gambar,
        $kategori,
        $penyebab,
        $gejala,
        $pencegahan,
        $obat,
        $status
    ) {
        $data = [
            "nama" => $nama,
            "deskripsi" => $deskripsi,
            "solusi" => $solusi,
            "gambar" => $gambar,
            "kategori" => $kategori,
            "status" => $status,
            "penyebab" => $penyebab,
            "gejala" => $gejala,
            "pencegahan" => $pencegahan,
            "obat" => $obat
        ];
        if ($id) {
            $model = Penyakit::find($id);
            unset($data['gambar']);
        } else {
            $model = new Penyakit();
        }
        $model->fill($data);
        return $model;
    }

    public function index()
    {
        $penyakit = Penyakit::all();
        return view('pageadmin.penyakit.index', compact('penyakit'));
    }

    public function create($id = null)
    {
        return view('pageadmin.penyakit.create', [
            "id" => $id,
            'penyakit' => Penyakit::find($id)
        ]);
    }

    public function store(Request $request)
    {
        try {
            $upload = Helpers::Images(
                $request,
                "gambar",
                "img-upload-penyakit/"
            );
            if ($upload->status) {
                $path = $upload->name;
            } else {
                $path = null;
            }
            $data = $this->fromRequest(
                id: $request->id,
                nama: $request->nama,
                deskripsi: $request->deskripsi,
                solusi: $request->solusi,
                gambar: $path,
                kategori: $request->kategori,
                penyebab: $request->penyebab,
                gejala: $request->gejala,
                pencegahan: $request->pencegahan,
                obat: $request->obat,
                status: "active"
            );
            $data->save();
            Alert::success('Success', 'Data berhasil disimpan');
            return redirect()->route('penyakit.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Data gagal disimpan');
            return redirect()->route('penyakit.index');
        }
    }

    public function edit($id)
    {
        return view('pageadmin.penyakit.create', [
            "id" => $id,
            'penyakit' => Penyakit::find($id)
        ]);
    }

    public function destroy(Penyakit $penyakit)
    {
        $penyakit->delete();
        return redirect()->route('penyakit.index');
    }
}
