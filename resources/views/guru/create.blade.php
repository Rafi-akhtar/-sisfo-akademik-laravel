@extends('layouts.main')

@section('title', 'Tambah Data Guru')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Guru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('guru.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
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
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection