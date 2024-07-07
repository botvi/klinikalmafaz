@php
    $pageHandler = [
        'title' => 'Data Layanan',
        'description' => 'Daftar semua layanan di Klinik Al Mafaz Benai.',
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
                <form action="{{ route('layanan.store') }}" method="POST">
                    @csrf
                    <input name="id" type="hidden" value="{{ old('id', $layanan->id ?? '') }}">
                    <div class="row">
                        <hr>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="nama">Nama</label>
                                <input class="form-control" id="nama" name="nama" required type="text"
                                    value="{{ old('nama', $layanan->nama ?? '') }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $layanan->deskripsi ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="kategori">Kategori</label>
                                <select class="form-select" id="kategori" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <option {{ old('kategori', $layanan->kategori ?? '') == 'Umum' ? 'selected' : '' }}
                                        value="Umum">
                                        Umum
                                    </option>
                                    <option {{ old('kategori', $layanan->kategori ?? '') == 'Khusus' ? 'selected' : '' }}
                                        value="Khusus">
                                        Khusus
                                    </option>
                                </select>
                            </div>
                        </div>

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
