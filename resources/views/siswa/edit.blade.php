@extends('layouts.main')

@section('title', 'Edit Data Siswa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Siswa</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>NIS</label>
                    <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}" required>
                </div>
                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="L" {{ $siswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="P" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas_id" class="form-control" required>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}" {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $siswa->no_hp }}" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required>{{ $siswa->alamat }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection