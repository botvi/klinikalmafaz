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
                            <li aria-current="page" class="breadcrumb-item active">Edit Rekam Medis</li>
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
                                @foreach ($pasiens as $pasien)
                                    <option {{ $rekamMedis->pasien_id == $pasien->id ? 'selected' : '' }}
                                        value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dokter_id">Dokter</label>
                            <select class="form-control" id="dokter_id" name="dokter_id" required>
                                @foreach ($dokters as $dokter)
                                    <option {{ $rekamMedis->dokter_id == $dokter->id ? 'selected' : '' }}
                                        value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="perawat_id">Perawat</label>
                                <select class="form-control" id="perawat_id" name="perawat_id" required>
                                    <option value="">Pilih Perawat</option>
                                    @foreach ($perawats as $perawat)
                                        <option {{ $rekamMedis->perawat_id == $perawat->id ? 'selected' : '' }}
                                            value="{{ $perawat->id }}">{{ $perawat->nama }}</option>
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
                                        <option {{ $rekamMedis->penyakit_id == $penyakit->id ? 'selected' : '' }}
                                            value="{{ $penyakit->id }}">{{ $penyakit->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="diagnosis">Diagnosis</label>
                            <textarea class="form-control" id="diagnosis" name="diagnosa" required>{{ $rekamMedis->diagnosa }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tindakan">Tindakan</label>
                            <textarea class="form-control" id="tindakan" name="tindakan" required>{{ $rekamMedis->tindakan }}</textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="keterangan">Resep</label>
                                <select class="form-control js-example-basic-multiple" multiple="multiple" name="resep[]">
                                    <option value="">--pilih resep--</option>
                                    @foreach ($obats as $obat)
                                        <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                        <a class="btn btn-secondary" href="{{ route('rekam_medis.index') }}">Batal</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.js-example-basic-multiple').select2();
        // set value select2
        const reseps = @json(json_decode($rekamMedis->resep));
        $('.js-example-basic-multiple').val(reseps).trigger('change');
    </script>
@endpush

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
