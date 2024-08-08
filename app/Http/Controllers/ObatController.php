<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obats = Obat::all();
        return view('pageadmin.obat.index', compact('obats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pageadmin.obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_obat' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        try {
            Obat::create($request->all());
            Alert::success('Berhasil', 'Data obat berhasil disimpan');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data obat gagal disimpan: ' . $e->getMessage());
        }

        return redirect()->route('obats.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.show', compact('obat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('pageadmin.obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'string|max:255',
            'kategori_obat' => 'string|max:255',
            'keterangan' => 'string',
        ]);

        try {
            $obat = Obat::findOrFail($id);
            $obat->update($request->all());
            Alert::success('Berhasil', 'Data obat berhasil diperbarui');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data obat gagal diperbarui: ' . $e->getMessage());
        }

        return redirect()->route('obats.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $obat = Obat::findOrFail($id);
            $obat->delete();
            Alert::success('Berhasil', 'Data obat berhasil dihapus');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data obat gagal dihapus: ' . $e->getMessage());
        }

        return redirect()->route('obats.index');
    }
}
