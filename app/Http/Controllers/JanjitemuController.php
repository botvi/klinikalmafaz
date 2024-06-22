<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Janjitemu;
use App\Models\Pasien;
use App\Models\Dokter;
use RealRashid\SweetAlert\Facades\Alert;

class JanjitemuController extends Controller
{
    public function index()
    {
        $janjitemus = Janjitemu::with(['pasien', 'dokter'])->get();
        return view('pageadmin.janjitemu.index', compact('janjitemus'));
    }

    public function tambah()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('pageadmin.janjitemu.tambah', compact('pasiens', 'dokters'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'status' => 'required|string|max:255',
        ]);

        Janjitemu::create($validatedData);

        Alert::success('Berhasil', 'Data janji temu berhasil disimpan');
        return redirect()->route('janjitemu.index');
    }

    public function edit($id)
    {
        $janjitemu = Janjitemu::findOrFail($id);
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('pageadmin.janjitemu.edit', compact('janjitemu', 'pasiens', 'dokters'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'pasien_id' => 'required|exists:pasiens,id',
        'dokter_id' => 'required|exists:dokters,id',
        'tanggal' => 'required|date',
        'status' => 'required|string|max:255',
    ]);

    $janjitemu = Janjitemu::findOrFail($id);
    $janjitemu->update($validatedData);

    Alert::success('Berhasil', 'Data janji temu berhasil diupdate');

    return redirect()->route('janjitemu.index');
}



    public function destroy($id)
    {
        $janjitemu = Janjitemu::findOrFail($id);
        $janjitemu->delete();

        Alert::success('Berhasil', 'Data janji temu berhasil dihapus');
        return redirect()->route('janjitemu.index');
    }
}
