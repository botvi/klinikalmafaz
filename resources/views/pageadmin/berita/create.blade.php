@extends('template-admin.layout')

@push('script')
    <script src="https://cdn.tiny.cloud/1/qrlq15z6viwxldpr266evyakae92wll0yaiqwh3i4alnwu8z/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@endpush
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Berita</h3>
                    <p class="text-subtitle text-muted">Tambah data berita baru.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Tambah Berita</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Form Tambah Berita</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('beritas.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" name="title" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required></textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label for="image">Image</label>
                            <input class="form-control" name="image" type="file">
                        </div>
                        <div class="form-group">
                            <label for="konten">Konten</label>
                            <textarea class="form-control" id="content" name="konten"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a class="btn btn-secondary" href="{{ route('beritas.index') }}">Batal</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
