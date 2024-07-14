<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        return view('pageadmin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('pageadmin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'konten' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita = new Berita();
        $berita->title = $request->title;
        $berita->deskripsi = $request->deskripsi;
        $berita->konten = $request->konten;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('berita'), $imageName);
            $berita->image = $imageName;
        }

        $berita->save();

        Alert::success('Berhasil', 'Berita berhasil dibuat.');

        return redirect()->route('beritas.index')->with('success', 'Berita created successfully.');
    }

    public function show(Berita $berita)
    {
        return view('pageadmin.berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return view('pageadmin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'konten' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita->title = $request->title;
        $berita->deskripsi = $request->deskripsi;
        $berita->konten = $request->konten;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('berita'), $imageName);
            $berita->image = $imageName;
        }

        $berita->save();

        Alert::success('Berhasil', 'Berita berhasil diperbarui.');

        return redirect()->route('beritas.index')->with('success', 'Berita updated successfully.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->image) {
            unlink(public_path('berita') . '/' . $berita->image);
        }
        $berita->delete();

        Alert::success('Berhasil', 'Berita berhasil dihapus.');

        return redirect()->route('beritas.index')->with('success', 'Berita deleted successfully.');
    }
}
