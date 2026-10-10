@extends('layouts.main')

@section('title', 'Tambah Data Siswa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Siswa</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>NIS</label>
                    <input type="text" name="nis" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas_id" class="form-control" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kelas }} ({{ $k->jurusan }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection