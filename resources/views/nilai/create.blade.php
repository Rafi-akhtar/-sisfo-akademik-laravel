@extends('layouts.main')

@section('title', 'Input Nilai Siswa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Input Nilai Siswa</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('nilai.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Pilih Siswa</label>
                    <select name="siswa_id" class="form-control" required>
                        <option value="">-- Pilih Siswa --</option>
                        @foreach($siswas as $s)
                            <option value="{{ $s->id }}">{{ $s->nama }} (NIS: {{ $s->nis }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilih Mata Pelajaran</label>
                    <select name="mapel_id" class="form-control" required>
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        @foreach($mapels as $m)
                            <option value="{{ $m->id }}">{{ $m->nama_mapel }} (KKM: {{ $m->kkm }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nilai Tugas (Bobot 30%)</label>
                    <input type="number" step="0.01" name="nilai_tugas" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nilai UTS (Bobot 30%)</label>
                    <input type="number" step="0.01" name="nilai_uts" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nilai UAS (Bobot 40%)</label>
                    <input type="number" step="0.01" name="nilai_uas" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan & Hitung Nilai</button>
                <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection