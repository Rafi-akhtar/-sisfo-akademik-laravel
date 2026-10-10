@extends('layouts.main')

@section('title', 'Tambah Data Kelas')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Kelas</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Kelas</label>
                    <input type="text" name="nama_kelas" class="form-control" placeholder="Contoh: XI RPL 1" required>
                </div>
                <div class="form-group">
                    <label>Tingkat</label>
                    <select name="tingkat" class="form-control" required>
                        <option value="">-- Pilih Tingkat --</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" placeholder="Contoh: Rekayasa Perangkat Lunak" required>
                </div>
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" class="form-control" placeholder="Contoh: 2025/2026" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection