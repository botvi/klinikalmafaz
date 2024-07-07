@php
    $pageHandler = [
        'title' => 'Pencatatan Mendis Pasien',
        'description' => 'Daftar semua pencatatan medis pasien di Klinik Al Mafaz Benai.',
    ];
    $tableHeader = ['pasien_id', 'dokter_id', 'perawat_id', 'penyakit_id', 'keterangan'];
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
                <form action="{{ route('rekam_medis.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input name="id" type="hidden" value="{{ old('id', $penyakit->id ?? '') }}">
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="pasien_id">Pasien</label>
                                <select class="form-control" id="pasien_id" name="pasien_id" required>
                                    <option value="">Pilih Pasien</option>
                                    @foreach ($pasiens as $pasien)
                                        <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="dokter_id">Dokter</label>
                                <select class="form-control" id="dokter_id" name="dokter_id" required>
                                    <option value="">Pilih Dokter</option>
                                    @foreach ($dokters as $dokter)
                                        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="perawat_id">Perawat</label>
                                <select class="form-control" id="perawat_id" name="perawat_id" required>
                                    <option value="">Pilih Perawat</option>
                                    @foreach ($perawats as $perawat)
                                        <option value="{{ $perawat->id }}">{{ $perawat->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="penyakit_id">Penyakit</label>
                                <select class="form-control" id="penyakit_id" name="penyakit_id" required>
                                    <option value="">Pilih Penyakit</option>
                                    @foreach ($penyakits as $penyakit)
                                        <option value="{{ $penyakit->id }}">{{ $penyakit->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" required>{{ old('keterangan', $penyakit->keterangan ?? '') }}</textarea>
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
