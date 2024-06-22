<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use RealRashid\SweetAlert\Facades\Alert;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('pageadmin.dokter.index', compact('dokters'));
    }

    public function tambah()
    {
        return view('pageadmin.dokter.tambah');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:dokters,email',
            'alamat' => 'required|string|max:255',
        ]);

        Dokter::create($validatedData);

        Alert::success('Berhasil', 'Data dokter berhasil disimpan');

        return redirect()->route('dokter.index');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('pageadmin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:dokters,email,' . $id,
            'alamat' => 'required|string|max:255',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->update($validatedData);

        Alert::success('Berhasil', 'Data dokter berhasil diupdate');

        return redirect()->route('dokter.index');
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        Alert::success('Berhasil', 'Data dokter berhasil dihapus');

        return redirect()->route('dokter.index');
    }
}
