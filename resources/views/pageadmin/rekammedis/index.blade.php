@extends('template-admin.layout')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Rekam Medis</h3>
                <p class="text-subtitle text-muted">Daftar semua rekam medis yang terdaftar di Klinik Al Mafaz Benai.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Rekam Medis</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Daftar Rekam Medis</h5>
                <a href="{{ route('rekam_medis.create') }}" class="btn btn-primary float-end">Tambah Rekam Medis</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Keluhan</th>
                            <th>Diagnosis</th>
                            <th>Tindakan</th>
                            <th>Resep</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rekamMedis as $rekam)
                        <tr>
                            <td>{{ $rekam->pasien->nama }}</td>
                            <td>{{ $rekam->dokter->nama }}</td>
                            <td>{{ $rekam->tanggal_kunjungan }}</td>
                            <td>{{ $rekam->keluhan }}</td>
                            <td>{{ $rekam->diagnosis }}</td>
                            <td>{{ $rekam->tindakan }}</td>
                            <td>{{ $rekam->resep }}</td>
                            <td>
                                <a href="{{ route('rekam_medis.edit', $rekam->id) }}" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger" onclick="confirmDelete({{ $rekam->id }})">Hapus</button>
                                <form id="delete-form-{{ $rekam->id }}" action="{{ route('rekam_medis.destroy', $rekam->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
@endsection
