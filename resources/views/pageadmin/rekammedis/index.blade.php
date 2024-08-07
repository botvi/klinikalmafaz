@php
    $pageHandler = [
        'title' => 'Pencatatan Medis Pasien',
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
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Daftar Riwyat Medis</h5>
                    <a class="btn btn-primary float-end" href="{{ route('rekam_medis.create') }}">Tambah</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>Nama Perawat</th>
                                <th>Nama Penyakit</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekam_medis as $rekam_medi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rekam_medi->pasien->nama ?? '' }}</td>
                                    <td>{{ $rekam_medi->dokter->nama ?? '' }}</td>
                                    <td>{{ $rekam_medi->perawat->nama ?? '' }}</td>
                                    <td>{{ $rekam_medi->penyakit->nama ?? '' }}</td>
                                    <td>{{ $rekam_medi->keterangan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($rekam_medi->created_at)->format('Y-m-d') }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('rekam_medis.edit', $rekam_medi->id) }}">Edit</a>
                                        <form action="{{ route('rekam_medis.destroy', $rekam_medi->id) }}"
                                            id="delete-form-{{ $rekam_medi->id }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $rekam_medi->id }})">Hapus</button>
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
