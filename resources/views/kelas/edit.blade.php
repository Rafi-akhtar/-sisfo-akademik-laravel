@extends('layouts.main')

@section('title', 'Edit Data Kelas')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Kelas</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('kelas.update', $kela->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nama Kelas</label>
                    <input type="text" name="nama_kelas" class="form-control" value="{{ $kela->nama_kelas }}" required>
                </div>
                <div class="form-group">
                    <label>Tingkat</label>
                    <input type="text" name="tingkat" class="form-control" value="{{ $kela->tingkat }}" required>
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="{{ $kela->jurusan }}" required>
                </div>
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" class="form-control" value="{{ $kela->tahun_ajaran }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection