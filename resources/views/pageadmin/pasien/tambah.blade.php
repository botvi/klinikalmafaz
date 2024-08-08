@extends('template-admin.layout')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Pasien</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="nama">Nik</label>
                                <input class="form-control" id="nik" maxlength="16" name="nik"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    placeholder="Nama Lengkap" required type="number">
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input class="form-control" id="nama" name="nama" placeholder="Nama Lengkap"
                                    required type="text">
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" required type="date">
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input class="form-control" id="alamat" name="alamat" placeholder="Alamat" required
                                    type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input class="form-control" id="telepon" name="telepon" placeholder="Nomor Telepon"
                                    required type="text">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" name="email" placeholder="Email" required
                                    type="email">
                            </div>

                            <div class="form-group">
                                <label for="tanggal_daftar">Tanggal Daftar</label>
                                <input class="form-control" id="tanggal_daftar" name="tanggal_daftar" required
                                    type="date">
                            </div>

                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
