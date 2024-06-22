@extends('template-admin.layout')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Rekam Medis</h3>
                <p class="text-subtitle text-muted">Edit data rekam medis di Klinik Al Mafaz Benai.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Rekam Medis</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Rekam Medis</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('rekam_medis.update', $rekamMedis->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="pasien_id">Pasien</label>
                        <select class="form-control" id="pasien_id" name="pasien_id" required>
                            @foreach($pasiens as $pasien)
                            <option value="{{ $pasien->id }}" {{ $rekamMedis->pasien_id == $pasien->id ? 'selected' : '' }}>{{ $pasien->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dokter_id">Dokter</label>
                        <select class="form-control" id="dokter_id" name="dokter_id" required>
                            @foreach($dokters as $dokter)
                            <option value="{{ $dokter->id }}" {{ $rekamMedis->dokter_id == $dokter->id ? 'selected' : '' }}>{{ $dokter->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                        <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan" value="{{ $rekamMedis->tanggal_kunjungan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea class="form-control" id="keluhan" name="keluhan" required>{{ $rekamMedis->keluhan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="diagnosis">Diagnosis</label>
                        <textarea class="form-control" id="diagnosis" name="diagnosis" required>{{ $rekamMedis->diagnosis }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tindakan">Tindakan</label>
                        <textarea class="form-control" id="tindakan" name="tindakan" required>{{ $rekamMedis->tindakan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="resep">Resep</label>
                        <textarea class="form-control" id="resep" name="resep" required>{{ $rekamMedis->resep }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('rekam_medis.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
