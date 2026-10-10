@extends('layouts.main')

@section('title', 'Data Mata Pelajaran')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Mata Pelajaran</h1>
        <a href="{{ route('mapel.create') }}" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Mapel</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mata Pelajaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Kode Mapel</th>
                            <th>Nama Mata Pelajaran</th>
                            <th>KKM Minimum</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mapels as $index => $m)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $m->kode_mapel }}</td>
                            <td>{{ $m->nama_mapel }}</td>
                            <td><span class="badge badge-warning">{{ $m->kkm }}</span></td>
                            <td>
                                <a href="{{ route('mapel.edit', $m->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('mapel.destroy', $m->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection