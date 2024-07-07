@php
    $pageHandler = [
        'title' => 'Data Perawat',
        'description' => 'Daftar semua perawat yang terdaftar di Klinik Al Mafaz Benai.',
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
                <form action="{{ route('perawat.store') }}" method="POST">
                    @csrf
                    <input name="id" type="hidden" value="{{ old('id', $perawat->id ?? '') }}">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="nama">Nama</label>
                                <input class="form-control" id="nama" name="nama" required type="text"
                                    value="{{ old('nama', $perawat->nama ?? '') }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat', $perawat->alamat ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="no_telp">No. Telp</label>
                                <input class="form-control" id="no_telp" name="no_telp" required type="text"
                                    value="{{ old('no_telp', $perawat->no_telp ?? '') }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option
                                        {{ old('jenis_kelamin', $perawat->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}
                                        value="L">Laki-laki
                                    </option>
                                    <option
                                        {{ old('jenis_kelamin', $perawat->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}
                                        value="P">Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="agama">Agama</label>
                                <select class="form-control" id="agama" name="agama" required>
                                    <option {{ old('agama', $perawat->agama ?? '') == 'Islam' ? 'selected' : '' }}
                                        value="Islam">Islam</option>
                                    <option {{ old('agama', $perawat->agama ?? '') == 'Kristen' ? 'selected' : '' }}
                                        value="Kristen">Kristen
                                    </option>
                                    <option {{ old('agama', $perawat->agama ?? '') == 'Katolik' ? 'selected' : '' }}
                                        value="Katolik">Katolik
                                    </option>
                                    <option {{ old('agama', $perawat->agama ?? '') == 'Hindu' ? 'selected' : '' }}
                                        value="Hindu">Hindu</option>
                                    <option {{ old('agama', $perawat->agama ?? '') == 'Budha' ? 'selected' : '' }}
                                        value="Budha">Budha</option>
                                    <option {{ old('agama', $perawat->agama ?? '') == 'Konghucu' ? 'selected' : '' }}
                                        value="Konghucu">Konghucu
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="pendidikan">Pendidikan</label>
                                <select class="form-control" id="pendidikan" name="pendidikan" required>
                                    <option {{ old('pendidikan', $perawat->pendidikan ?? '') == 'SD' ? 'selected' : '' }}
                                        value="SD">SD</option>
                                    <option {{ old('pendidikan', $perawat->pendidikan ?? '') == 'SMP' ? 'selected' : '' }}
                                        value="SMP">SMP</option>
                                    <option {{ old('pendidikan', $perawat->pendidikan ?? '') == 'SMA' ? 'selected' : '' }}
                                        value="SMA">SMA</option>
                                    <option {{ old('pendidikan', $perawat->pendidikan ?? '') == 'D3' ? 'selected' : '' }}
                                        value="D3">D3</option>
                                    <option {{ old('pendidikan', $perawat->pendidikan ?? '') == 'S1' ? 'selected' : '' }}
                                        value="S1">S1</option>
                                    <option {{ old('pendidikan', $perawat->pendidikan ?? '') == 'S2' ? 'selected' : '' }}
                                        value="S2">S2</option>
                                    <option {{ old('pendidikan', $perawat->pendidikan ?? '') == 'S3' ? 'selected' : '' }}
                                        value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header p-0">
                                    <h4 class="card-title text-start">Data Akun</h4>
                                </div>
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label for="email">Email</label>
                                                <input class="form-control" id="email" name="email" required
                                                    type="email" value="{{ old('email', $perawat->user->email ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label for="password">Password</label>
                                                <input {{ $perawat ? '' : 'required' }} class="form-control" id="password"
                                                    name="password" type="password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
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
