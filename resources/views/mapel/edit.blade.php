@extends('layouts.main')

@section('title', 'Edit Mata Pelajaran')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Mata Pelajaran</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Kode Mapel</label>
                    <input type="text" name="kode_mapel" class="form-control" value="{{ $mapel->kode_mapel }}" required>
                </div>
                <div class="form-group">
                    <label>Nama Mata Pelajaran</label>
                    <input type="text" name="nama_mapel" class="form-control" value="{{ $mapel->nama_mapel }}" required>
                </div>
                <div class="form-group">
                    <label>KKM Minimum</label>
                    <input type="number" name="kkm" class="form-control" value="{{ $mapel->kkm }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection