<?php

namespace App\Http\Controllers;

use App\Models\Perawat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PerawatController extends Controller
{
    public function fromRequest()
    {
        return [
            "id" => request('id') ?? null,
            "nama" => request('nama'),
            "alamat" => request('alamat'),
            "no_telp" => request('no_telp'),
            "jenis_kelamin" => request('jenis_kelamin'),
            "agama" => request('agama'),
            "pendidikan" => request('pendidikan'),
        ];
    }

    // crud
    public function index()
    {
        $perawat = Perawat::all();
        return view('pageadmin.perawat.index', compact('perawat'));
    }

    public function create($id = null)
    {
        return view('pageadmin.perawat.create', [
            "id" => $id,
            'perawat' => Perawat::find($id)
        ]);
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->id ? User::find(Perawat::find(request('id'))->user_id) : new User();
            $user->fill([
                "name" => request('nama'),
                "email" => request('email'),
            ]);
            if (request('id')) {
                $perawats = Perawat::find(request('id'));
                $user->id = $perawats->user_id;
            }
            if (request('password')) {
                $user->password = bcrypt(request('password'));
            }

            if (!$user->save()) {
                throw new \Exception("Error Saving Data");
            }
            $perawat = request('id') ? Perawat::find(request('id')) : new Perawat();
            $perawat->fill($this->fromRequest());
            $perawat->user_id = $user->id;
            if (!$perawat->save()) {
                throw new \Exception("Error Saving Data");
            }
            DB::commit();
            Alert::success('Success', 'Data Berhasil Ditambahkan');
            return redirect()->route('perawat.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error', 'Data Gagal Ditambahkan' . $th->getMessage());
            return redirect()->route('perawat.index');
        }
    }

    public function destroy(Perawat $perawat)
    {
        $perawat->delete();
        $perawat->user->delete();
        return redirect()->route('perawat.index');
    }
}
