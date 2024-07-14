@extends('template-admin.layout')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Berita</h3>
                    <p class="text-subtitle text-muted">Daftar semua berita yang telah dipublikasikan.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Berita</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Daftar Berita</h5>
                    <a class="btn btn-primary float-end" href="{{ route('beritas.create') }}">Tambah Berita</a>
                </div>
                <div class="card-body">

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Deskripsi</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beritas as $berita)
                                <tr>
                                    <td>{{ $berita->title }}</td>
                                    <td>{{ $berita->deskripsi }}</td>
                                    <td>
                                        @if ($berita->image)
                                            <img alt="Image" src="{{ asset('berita/' . $berita->image) }}"
                                                width="100">
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('beritas.edit', $berita->id) }}">Edit</a>
                                        <button class="btn btn-danger"
                                            onclick="confirmDelete('{{ $berita->id }}')">Delete</button>
                                        <form action="{{ route('beritas.destroy', $berita->id) }}"
                                            id="delete-form-{{ $berita->id }}" method="POST" style="display: none;">
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

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Berita ini tidak dapat dikembalikan!",
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
