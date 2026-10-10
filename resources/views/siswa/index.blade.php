@extends('layouts.main')

@section('title', 'Data Siswa')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Siswa</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa Terdaftar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswas as $index => $s)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $s->nis }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>
                                <span class="badge {{ $s->jenis_kelamin == 'L' ? 'badge-primary' : 'badge-danger' }}">
                                    {{ $s->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                                </span>
                            </td>
                            <td>{{ $s->kelas->nama_kelas ?? '-' }}</td>
                            <td>{{ $s->no_hp }}</td>
                            <td>
                                <a href="{{ route('siswa.show', $s->id) }}" class="btn btn-info btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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