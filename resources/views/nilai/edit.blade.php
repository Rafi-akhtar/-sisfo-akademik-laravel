@extends('layouts.main')

@section('title', 'Edit Nilai Siswa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Nilai Siswa</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Pilih Siswa</label>
                    <select name="siswa_id" class="form-control" required>
                        @foreach($siswas as $s)
                            <option value="{{ $s->id }}" {{ $nilai->siswa_id == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilih Mata Pelajaran</label>
                    <select name="mapel_id" class="form-control" required>
                        @foreach($mapels as $m)
                            <option value="{{ $m->id }}" {{ $nilai->mapel_id == $m->id ? 'selected' : '' }}>{{ $m->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nilai Tugas (Bobot 30%)</label>
                    <input type="number" step="0.01" name="nilai_tugas" class="form-control" value="{{ $nilai->nilai_tugas }}" required>
                </div>
                <div class="form-group">
                    <label>Nilai UTS (Bobot 30%)</label>
                    <input type="number" step="0.01" name="nilai_uts" class="form-control" value="{{ $nilai->nilai_uts }}" required>
                </div>
                <div class="form-group">
                    <label>Nilai UAS (Bobot 40%)</label>
                    <input type="number" step="0.01" name="nilai_uas" class="form-control" value="{{ $nilai->nilai_uas }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui & Hitung Ulang</button>
                <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection