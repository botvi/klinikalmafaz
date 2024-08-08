<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use RealRashid\SweetAlert\Facades\Alert;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pageadmin.pasien.index', compact('pasiens'));
    }

    public function tambah()
    {
        return view('pageadmin.pasien.tambah');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nik' => 'required|unique:pasiens,nik',
                'nama' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'telepon' => 'required|string|max:255',
                'email' => 'required|string|max:255|unique:pasiens,email',
                'tanggal_daftar' => 'required|date',
            ]);

            Pasien::create($validatedData);

            Alert::success('Berhasil', 'Data pasien berhasil disimpan');

            return redirect()->route('pasien.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Data pasien gagal disimpan');
            return redirect()->route('pasien.tambah');
        }
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pageadmin.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {

        try {
            $validatedData = $request->validate([
                'nik' => 'required|unique:pasiens,nik,' . $id,
                'nama' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'telepon' => 'required|string|max:255',
                'email' => 'required|string|max:255|unique:pasiens,email,' . $id,
                'tanggal_daftar' => 'required|date',
            ]);

            $pasien = Pasien::findOrFail($id);
            $pasien->update($validatedData);

            Alert::success('Berhasil', 'Data pasien berhasil diupdate');

            return redirect()->route('pasien.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Data pasien gagal diupdate');
            return redirect()->route('pasien.edit', $id);
        }
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        Alert::success('Berhasil', 'Data pasien berhasil dihapus');

        return redirect()->route('pasien.index');
    }
}
