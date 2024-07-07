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
                            <li aria-current="page" class="breadcrumb-item active">
                                {{ $pageHandler['title'] }}
                            </li>
                        </ol>
                        <a class="btn btn-primary float-end" href="{{ route('perawat.create') }}">Tambah</a>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Pendidikan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perawat as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->user->email }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->agama }}</td>
                                    <td>{{ $item->pendidikan }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('perawat.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('perawat.destroy', $item->id) }}"
                                            id="delete-form-{{ $item->id }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button class="btn btn-danger"
                                            onclick="confirmDelete({{ $item->id }})">Hapus</button>
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
