<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LayananController extends Controller
{
    public function fromRequest(
        $id = null,
        $nama = null,
        $deskripsi = null,
        $kategori = null
    ) {
        $data = [
            "nama" => $nama,
            "deskripsi" => $deskripsi,
            "kategori" => $kategori,
            "status" => "active"
        ];
        if ($id) {
            $model = layanan::find($id);
        } else {
            $model = new layanan();
        }
        $model->fill($data);
        return $model;
    }

    public function index()
    {
        $layanan = layanan::all();
        return view('pageadmin.layanan.index', compact('layanan'));
    }

    public function create($id = null)
    {
        return view('pageadmin.layanan.create', [
            "id" => $id,
            'layanan' => Layanan::find($id)
        ]);
    }

    public function store(Request $request)
    {
        try {
            $data = $this->fromRequest(
                $request->id,
                $request->nama,
                $request->deskripsi,
                $request->kategori
            );
            $data->save();
            Alert::success('Success', 'Data berhasil disimpan');
            return redirect()->route('layanan.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Data gagal disimpan');
            return redirect()->route('layanan.index');
        }
    }

    public function edit($id)
    {
        return view('pageadmin.layanan.create', [
            "id" => $id,
            'layanan' => Layanan::find($id)
        ]);
    }

    public function destroy($id)
    {
        $data = Layanan::find($id);
        $data->delete();
        return redirect()->route('layanan.index');
    }
}
