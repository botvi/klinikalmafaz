@php
    $pageHandler = [
        'title' => 'Laporan Riwayat Medis',
        'description' => 'Halaman laporan riwayat medis pasien.',
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
                        <a class="btn btn-primary float-end"
                            href="{{ route('laporan.lp_catatan_cetak', ['id' => request('id')]) }}">
                            {{-- print --}}
                            Cetak
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">

                <div class="card-body">
                    <table class="table table-striped" id="tables">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>Nama Perawat</th>
                                <th>Nama Penyakit</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekam_medis as $rekam_medi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rekam_medi->pasien->nama }}</td>
                                    <td>{{ $rekam_medi->dokter->nama }}</td>
                                    <td>{{ $rekam_medi->perawat->nama }}</td>
                                    <td>{{ $rekam_medi->penyakit->nama }}</td>
                                    <td>{{ $rekam_medi->keterangan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($rekam_medi->created_at)->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
