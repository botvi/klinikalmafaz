@php
    $pageHandler = [
        'title' => 'Data Penyakit',
        'description' => 'Daftar semua penyakit yang terdaftar.',
    ];
@endphp
@extends('template-admin.layout')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-2">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $pageHandler['title'] }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ $pageHandler['description'] }}
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li aria-current="page" class="breadcrumb-item">
                                {{ $pageHandler['title'] }}
                            </li>
                            <li aria-current="page" class="breadcrumb-item active">
                                From Entry
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('penyakit.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input name="id" type="hidden" value="{{ old('id', $penyakit->id ?? '') }}">
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="nama">Nama Penyakit</label>
                                <input class="form-control" id="nama" name="nama" required type="text"
                                    value="{{ old('nama', $penyakit->nama ?? '') }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $penyakit->deskripsi ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="solusi">Solusi</label>
                                <textarea class="form-control" id="solusi" name="solusi" required>{{ old('solusi', $penyakit->solusi ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="gambar">
                                    Gambar Model Penyakit
                                </label>
                                <input class="form-control" id="gambar" name="gambar" type="file">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="kategori">Kategori</label>
                                <select class="form-select" id="kategori" name="kategori" required>
                                    <option {{ old('kategori', $penyakit->kategori ?? '') == 'Umum' ? 'selected' : '' }}
                                        value="Umum">Umum</option>
                                    <option {{ old('kategori', $penyakit->kategori ?? '') == 'Khusus' ? 'selected' : '' }}
                                        value="Khusus">Khusus</option>
                                    <option {{ old('kategori', $penyakit->kategori ?? '') == 'Infeksi' ? 'selected' : '' }}
                                        value="Infeksi">Infeksi</option>
                                    <option {{ old('kategori', $penyakit->kategori ?? '') == 'Genetik' ? 'selected' : '' }}
                                        value="Genetik">Genetik</option>
                                    <option {{ old('kategori', $penyakit->kategori ?? '') == 'Kanker' ? 'selected' : '' }}
                                        value="Kanker">Kanker</option>
                                    <option
                                        {{ old('kategori', $penyakit->kategori ?? '') == 'Kardiovaskular' ? 'selected' : '' }}
                                        value="Kardiovaskular">Kardiovaskular</option>
                                    <option
                                        {{ old('kategori', $penyakit->kategori ?? '') == 'Autoimun' ? 'selected' : '' }}
                                        value="Autoimun">Autoimun</option>
                                    <option
                                        {{ old('kategori', $penyakit->kategori ?? '') == 'Metabolik' ? 'selected' : '' }}
                                        value="Metabolik">Metabolik</option>
                                    <option
                                        {{ old('kategori', $penyakit->kategori ?? '') == 'Neurologis' ? 'selected' : '' }}
                                        value="Neurologis">Neurologis</option>
                                    <option
                                        {{ old('kategori', $penyakit->kategori ?? '') == 'Pernapasan' ? 'selected' : '' }}
                                        value="Pernapasan">Pernapasan</option>
                                    <option
                                        {{ old('kategori', $penyakit->kategori ?? '') == 'Pencernaan' ? 'selected' : '' }}
                                        value="Pencernaan">Pencernaan</option>
                                    <option {{ old('kategori', $penyakit->kategori ?? '') == 'Kulit' ? 'selected' : '' }}
                                        value="Kulit">Kulit</option>
                                    <option {{ old('kategori', $penyakit->kategori ?? '') == 'Mata' ? 'selected' : '' }}
                                        value="Mata">Mata</option>
                                    <option {{ old('kategori', $penyakit->kategori ?? '') == 'THT' ? 'selected' : '' }}
                                        value="THT">THT (Telinga, Hidung, Tenggorokan)</option>
                                    <option
                                        {{ old('kategori', $penyakit->kategori ?? '') == 'Psikiatris' ? 'selected' : '' }}
                                        value="Psikiatris">Psikiatris</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="penyebab">Penyebab Umum</label>
                                <textarea class="form-control" id="penyebab" name="penyebab" required>{{ old('penyebab', $penyakit->penyebab ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="gejala">Gejala Umum</label>
                                <textarea class="form-control" id="gejala" name="gejala" required>{{ old('gejala', $penyakit->gejala ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="pencegahan">Pencegahan</label>
                                <textarea class="form-control" id="pencegahan" name="pencegahan" required>{{ old('pencegahan', $penyakit->pencegahan ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="obat">Obat</label>
                                <textarea class="form-control" id="obat" name="obat" required>{{ old('obat', $penyakit->obat ?? '') }}</textarea>
                            </div>
                        </div>

                        <hr />
                        <div class="col-12 text-end">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a class="btn btn-danger" href="{{ route('pasien.index') }}">Batal</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
