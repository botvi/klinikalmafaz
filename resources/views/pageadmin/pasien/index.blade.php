@extends('template-admin.layout')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Pasien</h3>
                    <p class="text-subtitle text-muted">Daftar semua pasien yang terdaftar di Klinik Al Mafaz Benai.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Data Pasien</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Daftar Pasien
                    </h5>
                    <a class="btn btn-primary float-end" href="{{ route('pasien.tambah') }}">Tambah Pasien</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="tables" id="tables">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Tanggal Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasiens as $pasien)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pasien->nik }}</td>
                                    <td>{{ $pasien->nama }}</td>
                                    <td>{{ $pasien->email }}</td>
                                    <td>{{ $pasien->telepon }}</td>
                                    <td>{{ $pasien->alamat }}</td>
                                    <td>{{ $pasien->tanggal_daftar }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('pasien.edit', $pasien->id) }}">Edit</a>
                                        <button class="btn btn-danger"
                                            onclick="confirmDelete({{ $pasien->id }})">Hapus</button>
                                        <form action="{{ route('pasien.destroy', $pasien->id) }}"
                                            id="delete-form-{{ $pasien->id }}" method="POST" style="display: none;">
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
