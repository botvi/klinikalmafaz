@extends('template-admin.layout')

@section('content')
<div class="page-heading">
    <h3>Edit Janji Temu</h3>
</div>
<section class="section">
    <div class="card">
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
            <form action="{{ route('janjitemu.update', $janjitemu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="pasien_id">Pasien</label>
                    <select name="pasien_id" id="pasien_id" class="form-control">
                        @foreach($pasiens as $pasien)
                            <option value="{{ $pasien->id }}" {{ $pasien->id == $janjitemu->pasien_id ? 'selected' : '' }}>{{ $pasien->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="dokter_id">Dokter</label>
                    <select name="dokter_id" id="dokter_id" class="form-control">
                        @foreach($dokters as $dokter)
                            <option value="{{ $dokter->id }}" {{ $dokter->id == $janjitemu->dokter_id ? 'selected' : '' }}>{{ $dokter->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $janjitemu->tanggal }}">
                </div>
                <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input type="time" name="waktu" id="waktu" class="form-control" value="{{ $janjitemu->waktu }}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" class="form-control" value="{{ $janjitemu->status }}">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</section>
@endsection
