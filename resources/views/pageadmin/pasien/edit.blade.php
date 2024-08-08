@extends('template-admin.layout')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Data Pasien</h3>
                    <p class="text-subtitle text-muted">Edit data pasien yang terdaftar di Klinik Al Mafaz Benai.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Edit Data Pasien</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edit Pasien</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nik</label>
                            <input class="form-control" id="nik" name="nik"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                placeholder="Nama Lengkap" required type="number" value="{{ $pasien->nik }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" id="nama" name="nama" required type="text"
                                value="{{ $pasien->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" required type="date"
                                value="{{ $pasien->tanggal_lahir }}">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }} value="Laki-laki">
                                    Laki-laki</option>
                                <option {{ $pasien->jenis_kelamin == 'Perempuan' ? 'selected' : '' }} value="Perempuan">
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input class="form-control" id="alamat" name="alamat" required type="text"
                                value="{{ $pasien->alamat }}">
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input class="form-control" id="telepon" name="telepon" required type="text"
                                value="{{ $pasien->telepon }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" required type="email"
                                value="{{ $pasien->email }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_daftar">Tanggal Daftar</label>
                            <input class="form-control" id="tanggal_daftar" name="tanggal_daftar" required type="date"
                                value="{{ $pasien->tanggal_daftar }}">
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                        <a class="btn btn-secondary" href="{{ route('pasien.index') }}">Batal</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
